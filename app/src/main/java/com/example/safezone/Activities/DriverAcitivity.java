package com.example.safezone.Activities;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

import com.example.safezone.R;

public class DriverAcitivity extends AppCompatActivity {
    TextView user_id, user_name;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_driver_acitivity);
        user_id = (TextView) findViewById(R.id.DriverId);
        user_name = (TextView) findViewById(R.id.driverName);

        //getting intent extra information for action bar
        Intent intent = getIntent();
        String userId = intent.getStringExtra("userId");
        String userName = intent.getStringExtra("UserName");

        user_name.setText(userName); // Set the username in the TextView
        user_id.setText(userId);
    }
}