package com.example.safezonedriver;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;

import com.example.safezonedriver.NavFragment.AccountDetailsFragment;
import com.example.safezonedriver.NavFragment.DriverHomeFragment;
import com.example.safezonedriver.NavFragment.NotificationsFragment;
import com.example.safezonedriver.R;
import com.google.android.material.bottomnavigation.BottomNavigationView;

public class MainActivity extends AppCompatActivity implements BottomNavigationView.OnNavigationItemSelectedListener {

    private BottomNavigationView bottomNavigationView;
    private Fragment currentFragment;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        TextView user_id, user_name;
        loadFragment(new DriverHomeFragment());
        bottomNavigationView = findViewById(R.id.bottomNavigationView);
        bottomNavigationView.setOnNavigationItemSelectedListener(this);
        user_id = (TextView) findViewById(R.id.UserId);
        user_name = (TextView) findViewById(R.id.UserName);


        //getting intent extra information for action bar
        Intent intent = getIntent();
        String userId = intent.getStringExtra("userId");
        String userName = intent.getStringExtra("UserName");

        user_name.setText(userName); // Set the username in the TextView
        user_id.setText(userId);
    }
    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        Fragment selectedFragment;

        int itemId = menuItem.getItemId();
        if (itemId == R.id.home) {
            selectedFragment = new DriverHomeFragment();
        } else if (itemId == R.id.studList) {
            selectedFragment = new NotificationsFragment();
        } else if (itemId == R.id.account_details) {
            selectedFragment = new AccountDetailsFragment();
        } else {
            selectedFragment = new DriverHomeFragment();
        }

        // Load the selected fragment into the FrameLayout container
        loadFragment(selectedFragment);
        return true;
    }

    private void loadFragment(Fragment fragment) {
        if (fragment != null && currentFragment != fragment) {
            getSupportFragmentManager().beginTransaction()
                    .replace(R.id.fragmentContainer, fragment)
                    .commit();
            currentFragment = fragment;
        }
    }
}