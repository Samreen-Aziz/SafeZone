package com.example.safezone.Activities;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.safezone.ModelResponse.LoginResponse;
import com.example.safezone.R;
import com.example.safezone.RetrofitClient;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import com.example.safezone.ModelResponse.User;
import com.google.firebase.FirebaseApp;
import com.google.firebase.messaging.FirebaseMessaging;

public class Login extends AppCompatActivity implements View.OnClickListener {
    EditText user_id, password;
    Button login;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        FirebaseApp.initializeApp(this);

        // Subscribe to the topic
        FirebaseMessaging.getInstance().subscribeToTopic("TOPIC")
                .addOnCompleteListener(task -> {
                    if (task.isSuccessful()) {
                        Log.d("TAG", "Subscribed to topic successfully");
                    } else {
                        Log.e("TAG", "Failed to subscribe to topic: " + task.getException());
                    }
                });
        user_id = findViewById(R.id.user_id);
        password = findViewById(R.id.password);
        login = findViewById(R.id.login_button);
        login.setOnClickListener(this::onClick);


    }
    public void onClick(View view){
        userLogin();
    }

    private void userLogin(){
        String id = user_id.getText().toString();
        String  pass = password.getText().toString();


        if (id.isEmpty()){
            user_id.requestFocus();
            user_id.setError("Please enter your ID");
            return;
        }

        if (pass.isEmpty()){
            password.requestFocus();
            password.setError("Please enter your password");
            return;
        }

        Call<LoginResponse> call= RetrofitClient.getInstance().getApi().login(id,pass);
        call.enqueue(new Callback<LoginResponse>() {
            @Override
            public void onResponse(Call<LoginResponse> call, Response<LoginResponse> response) {
                LoginResponse loginResponse = response.body();
                Log.d("Login Response", "Message: " + loginResponse);

                if (loginResponse != null) {
                    Log.d("Login Response", "Error: " + loginResponse.getError());
                    Log.d("Login Response", "Message: " + loginResponse.getMessage());
                    Log.d("Login Response", "User: " + loginResponse.getUser().toString());
                    // Log other fields of the loginResponse object as needed
                } else {
                    Log.d("Login Response", "Null response");
                }
                if (loginResponse.getError().equals("200")){
                    String userName = loginResponse.getUser().getName();
                    String userId = loginResponse.getUser().getUser_id();
                    String userType = loginResponse.getUser().getUser_type();
                    Log.d("Login Response", "User Type: " + userType);

                    if ("driver".equals(userType)) {
                        Intent driverIntent = new Intent(Login.this, DriverAcitivity.class);
                        driverIntent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK| Intent.FLAG_ACTIVITY_CLEAR_TASK);
                        driverIntent.putExtra("userId", userId);
                        driverIntent.putExtra("UserName", userName); // Pass the username to MainActivity
                        startActivity(driverIntent);
                    } else if ("parent".equals(userType)) {
                        Intent parentIntent = new Intent(Login.this, MainActivity.class);
                        parentIntent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK| Intent.FLAG_ACTIVITY_CLEAR_TASK);
                        parentIntent.putExtra("userId", userId);
                        parentIntent.putExtra("UserName", userName); // Pass the username to MainActivity
                        startActivity(parentIntent);
                    }

                    Toast.makeText(Login.this, loginResponse.getMessage(), Toast.LENGTH_SHORT).show();
                }
                else{
                    Toast.makeText(Login.this, loginResponse.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<LoginResponse> call, Throwable t) {
                Toast.makeText(Login.this, t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}