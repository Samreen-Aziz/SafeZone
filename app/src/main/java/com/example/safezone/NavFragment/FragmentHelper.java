package com.example.safezone.NavFragment;

import android.content.Context;
import com.example.safezone.R;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;

public class FragmentHelper {

    private static FragmentHelper instance;
    private FragmentManager fragmentManager;

    private FragmentHelper(Context context) {
        fragmentManager = ((AppCompatActivity) context).getSupportFragmentManager();
    }

    public static synchronized FragmentHelper getInstance(Context context) {
        if (instance == null) {
            instance = new FragmentHelper(context);
        }
        return instance;
    }

    public void switchFragment(Fragment fragment) {
        String backStackTag = fragment.getClass().getSimpleName();
        fragmentManager.beginTransaction()
                .replace(R.id.fragmentContainer, fragment)
                .addToBackStack(backStackTag)
                .commit();
    }

    public boolean popBackStack() {
        if (fragmentManager.getBackStackEntryCount() > 0) {
            fragmentManager.popBackStack();
            return true;
        }
        return false;
    }
}
