package com.example.safezonedriver.api;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

import com.example.safezonedriver.model.Constants;

public class ApiUtilities {
    private static Retrofit retrofitFCM = null;
    private static Retrofit retrofitPHP = null;

    private ApiUtilities() {
        // Private constructor to prevent instantiation
    }

    public static synchronized Retrofit getClientForFCM() {
        if (retrofitFCM == null) {
            retrofitFCM = new Retrofit.Builder()
                    .baseUrl(Constants.FCM_BASE_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }
        return retrofitFCM;
    }

    public static synchronized Retrofit getClientForPHP() {
        if (retrofitPHP == null) {
            retrofitPHP = new Retrofit.Builder()
                    .baseUrl(Constants.PHP_BASE_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }
        return retrofitPHP;
    }
}
