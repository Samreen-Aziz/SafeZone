package com.example.safezonedriver.NavFragment;

import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.core.content.ContextCompat;
import androidx.fragment.app.Fragment;

import com.example.safezonedriver.R;
import com.example.safezonedriver.api.ApiInterface;
import com.example.safezonedriver.api.ApiUtilities;
import com.example.safezonedriver.model.Constants;
import com.example.safezonedriver.model.NotificationData;
import com.example.safezonedriver.model.PushNotification;
import com.example.safezonedriver.model.insertNotificationResponse;

import java.text.SimpleDateFormat;
import java.util.Date;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;

public class DriverHomeFragment extends Fragment {

    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    private String mParam1;
    private String mParam2;
    // Declare variables to keep track of the selected card
    private CardView selectedCard;
    private String selectedReason;
    private CardView heavyTrafficCard;
    private CardView vehicleDamageCard;
    private CardView offTimeDelayCard;
    private CardView othersCard;
    private boolean isCardSelected = false;
    String notificationBody;
    Date currentDate;
    SimpleDateFormat dateFormat;
    SimpleDateFormat timeFormat;
    String formattedDate;
    String formattedTime;

    public DriverHomeFragment() {
        // Required empty public constructor
    }

    @NonNull
    public static DriverHomeFragment newInstance(String param1, String param2) {
        DriverHomeFragment fragment = new DriverHomeFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_driver_home, container, false);
        // Find the CardViews inside the fragment's view
        heavyTrafficCard = rootView.findViewById(R.id.heavyTrafficCard);
        vehicleDamageCard = rootView.findViewById(R.id.vehicleDamageCard);
        offTimeDelayCard = rootView.findViewById(R.id.offTimeDelayCard);
        othersCard = rootView.findViewById(R.id.othersCard);

        // Get the current date and time
        currentDate = new Date();
        dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        timeFormat = new SimpleDateFormat("HH:mm:ss");
        formattedDate = dateFormat.format(currentDate);
        formattedTime = timeFormat.format(currentDate);

        // Set click listeners for each card
        heavyTrafficCard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                handleCardSelection(heavyTrafficCard, "Heavy Traffic");
            }
        });

        vehicleDamageCard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                handleCardSelection(vehicleDamageCard, "Vehicle Damage");
            }
        });

        offTimeDelayCard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                handleCardSelection(offTimeDelayCard, "Off time Delay");
            }
        });

        othersCard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                handleCardSelection(othersCard, "Others");
            }
        });
        // Find the submit button and set its click listener
        Button submitButton = rootView.findViewById(R.id.button);
        submitButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Send the selected reason as a notification to parents
                if (selectedReason != null) {
                    NotificationData notificationData = new NotificationData("Notification from driver!", selectedReason, formattedDate, formattedTime);
                    PushNotification notification = new PushNotification(notificationData, Constants.TOPIC);
                    sendNotification(notification);
                    // Deselect the card after sending the notification
                    if (selectedCard != null) {
                        deselectCard(selectedCard);
                        selectedCard = null;
                        selectedReason = null;
                    }
                } else {
                    Toast.makeText(getContext(), "Please select a reason!", Toast.LENGTH_SHORT).show();
                }
            }
        });
        return rootView;
    }
    // Method to handle card selection
    private void handleCardSelection(CardView cardView, String reason) {
        if (selectedCard != null && selectedCard != cardView) {
            deselectCard(selectedCard);
        }
        if (!isCardSelected || selectedCard != cardView) {
            selectCard(cardView);
            selectedCard = cardView;
            selectedReason = reason;
        } else {
            deselectCard(cardView);
            selectedCard = null;
            selectedReason = null;
        }
        // Update the selected card and reason variables
        selectedCard = cardView;
        selectedReason = reason;
    }
    // Method to animate card selection
    private void selectCard(CardView cardView) {
        isCardSelected = true;
        cardView.animate()
                .scaleX(0.9f)
                .scaleY(0.9f)
                .setDuration(200)
                .start();
        cardView.setForeground(ContextCompat.getDrawable(getContext(), R.drawable.card_border));

    }

    // Method to animate card deselection
    private void deselectCard(CardView cardView) {

        isCardSelected = false;
        cardView.animate()
                .scaleX(1.0f)
                .scaleY(1.0f)
                .setDuration(200)
                .start();
        cardView.setForeground(null);
    }

    private void sendNotification(PushNotification notification) {
        Retrofit fcmretrofit = ApiUtilities.getClient("https://fcm.googleapis.com");
        ApiInterface fcmapiInterface = fcmretrofit.create(ApiInterface.class);
        fcmapiInterface.sendNotification(notification).enqueue(new Callback<PushNotification>(){
            @Override
            public void onResponse(Call<PushNotification> call, Response<PushNotification> response) {
                Log.d("NetworkLogfirebase", "Request URL: " + call.request().url());

                if (response.isSuccessful()) {
                    String notificationBody = notification.getData().getMessage();
                    Log.d("Notification Body", "Notification Body" + notificationBody);
                    saveNotificationToServer(notificationBody); // Call the method to save the notification data to the server
                    Log.d("Response", response.toString());
                    Toast.makeText(getContext(), "Notification sent successfully", Toast.LENGTH_SHORT).show();
                }
                else {
                    Toast.makeText(getContext(), "Notification failed to send", Toast.LENGTH_SHORT).show();
                }
            }
            @Override
            public void onFailure(Call<PushNotification> call, Throwable t) {
                Toast.makeText(getContext(), t.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }
    private void saveNotificationToServer(String notificationContent) {
        Retrofit phpretrofit = ApiUtilities.getClient(Constants.PHP_BASE_URL);
        ApiInterface phpsaveNotif = phpretrofit.create(ApiInterface.class);

        phpsaveNotif.insertNotification(notificationContent, formattedDate, formattedTime)
                .enqueue(new Callback<insertNotificationResponse>() {
        // Call the API to save notification data to the server
            @Override
            public void onResponse(Call<insertNotificationResponse> call, Response<insertNotificationResponse> response) {
                Log.d("NetworkLogs", "Request URL: " + call.request().url());

                if (response.isSuccessful()) {
                    insertNotificationResponse insertNotificationResponse = response.body();

                    if (insertNotificationResponse != null) {
                        Log.d("Notification Insertion", "Insertion is successful: " + insertNotificationResponse.getMessage());
                    } else {
                        Log.d("Notification Insertion", "Null response");
                    }
                } else {
                    // Handle the case when the response is not successful (e.g., server error)
                    Log.d("Notification Insertion", "Response not successful" );
                }
            }
                    @Override
            public void onFailure(Call<insertNotificationResponse> call, Throwable t) {
                // Handle the failure if needed
                        Log.e("NetworkLogs", "Request URL: " + call.request().url());
                        Log.e("NetworkLogs", "onFailure: " + t.getMessage(), t);
                Log.d("Connection Error", "Check Your Connection");
            }
        });
    }
}
