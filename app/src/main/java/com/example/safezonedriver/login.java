package com.example.safezonedriver;


import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.safezonedriver.api.RetrofitClient;
import com.example.safezonedriver.model.LoginResponse;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
public class login extends AppCompatActivity implements View.OnClickListener {
    EditText user_id, password;
    Button login;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

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
                    Log.d("Login Response", "Null response");}

                if (loginResponse.getError().equals("200")){
                    String userName = loginResponse.getUser().getName();
                    String userId = loginResponse.getUser().getUser_id();

                    Intent intent = new Intent(login.this, MainActivity.class);
                    intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK| Intent.FLAG_ACTIVITY_CLEAR_TASK);
                    // Pass the username and userId to MainActivity
                    intent.putExtra("userId", userId);
                    intent.putExtra("UserName", userName);
                    startActivity(intent);
                    Toast.makeText(login.this, loginResponse.getMessage(),
                            Toast.LENGTH_SHORT).show();
                }
                else{
                    Toast.makeText(login.this, loginResponse.getMessage(),
                            Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<LoginResponse> call, Throwable t) {
                Toast.makeText(login.this, t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}
