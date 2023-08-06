package com.example.safezone.Activities;

import static com.google.firebase.messaging.reporting.MessagingClientEvent.MessageType.TOPIC;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.example.safezone.R;
import com.example.safezone.RetrofitClient;
import androidx.appcompat.app.AppCompatActivity;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import com.example.safezone.ModelResponse.ReportingResponse;
import com.google.firebase.messaging.FirebaseMessaging;

public class reporting extends AppCompatActivity implements AdapterView.OnItemSelectedListener {
    private String selected_report_type_spinner, selected_parent_status_spinner, p_id;
    EditText report_content;
    TextView user_id;
    Button submit;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reporting); // Set the layout for the reporting activity

        report_content = findViewById(R.id.report_content);
        user_id = findViewById(R.id.UserId);
        submit = findViewById(R.id.submit_button);
        Spinner report_type = findViewById(R.id.spinner_report);
        Spinner parent_status = findViewById(R.id.spinner_credentials);

        // Code for Report type spinner
        ArrayAdapter<CharSequence> report_type_adapter = ArrayAdapter.createFromResource(this, R.array.spinner_items, android.R.layout.simple_spinner_item);
        report_type_adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        // Setting the ArrayAdapter data on the Report Type Spinner
        report_type.setAdapter(report_type_adapter);
        report_type.setOnItemSelectedListener(this);

        // Code for parent status spinner
        ArrayAdapter<CharSequence> parent_status_adapter = ArrayAdapter.createFromResource(this, R.array.spinner_items2, android.R.layout.simple_spinner_item);
        parent_status_adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        // Setting the ArrayAdapter data on the Parent Status Spinner
        parent_status.setAdapter(parent_status_adapter);
        parent_status.setOnItemSelectedListener(this);

        submit.setOnClickListener(this::onClick);
    }


    //Performing action onItemSelected and onNothing selected
    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

        int spinnerId = parent.getId();
        String selectedItem = parent.getItemAtPosition(position).toString();
        if (spinnerId == R.id.spinner_report) {
            selected_report_type_spinner = selectedItem;
            Log.d("Report type", selected_report_type_spinner);
            updateParentStatusSpinner(selected_report_type_spinner);
        } else if (spinnerId == R.id.spinner_credentials) {
            selected_parent_status_spinner = selectedItem;
            Log.d("Parent Status", selected_parent_status_spinner);
        }
    }
    private void updateParentStatusSpinner(String reportType) {
        Spinner parent_status = findViewById(R.id.spinner_credentials);
        ArrayAdapter<CharSequence> parent_status_adapter;

        if (reportType.equalsIgnoreCase("Report")) {
            parent_status_adapter = ArrayAdapter.createFromResource(this, R.array.spinner_items2, android.R.layout.simple_spinner_item);
        } else { // "Leave" is selected, restrict to "With Credentials" only
            parent_status_adapter = ArrayAdapter.createFromResource(this, R.array.spinner_items2_leave, android.R.layout.simple_spinner_item);
        }

        parent_status_adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        parent_status.setAdapter(parent_status_adapter);
    }
    @Override
    public void onNothingSelected(AdapterView<?> arg0) {
        // TODO Auto-generated method stub
    }

    public void onClick(View view){
        report_submitted();
    }
    private void report_submitted() {
        String id = user_id.getText().toString();
        String get_report_content = report_content.getText().toString();
        FirebaseMessaging.getInstance().subscribeToTopic(String.valueOf(TOPIC));

        if (get_report_content.isEmpty()){
            report_content.requestFocus();
            report_content.setError("Please write report");
            return;
        }

        String reportType = selected_report_type_spinner.equalsIgnoreCase("report") ? "report" : "leave";
        String parentStatus = selected_parent_status_spinner.equalsIgnoreCase("with credentials") ? "with credentials" : "anonymously";

        Call<ReportingResponse> call = RetrofitClient.getInstance().getApi().reporting(id, reportType, parentStatus, get_report_content);
        call.enqueue(new Callback<ReportingResponse>() {
            @Override
            public void onResponse(Call<ReportingResponse> call, Response<ReportingResponse> response) {
                ReportingResponse reportingResponse = response.body();
                if (reportingResponse != null){
                    Log.d("Reporting Response","Error: " + reportingResponse.getError());
                    Log.d("Reporting Response","Message: " + reportingResponse.getMessage());
                }
                else {
                    Log.d("Reporting Response", "Null response");
                }

                if (reportingResponse.getError().equals("200")){
                    //Main reporting response
                    Toast.makeText(reporting.this, reportingResponse.getMessage(), Toast.LENGTH_SHORT).show();
                }
                else{
                    Toast.makeText(reporting.this, reportingResponse.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }
            @Override
            public void onFailure(Call<ReportingResponse> call, Throwable t) {
                Log.e("Reporting Response", "Error: " + t.getMessage());
                Toast.makeText(reporting.this, "Error: " + t.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }
}