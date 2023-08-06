package com.example.safezonedriver.api;

import com.example.safezonedriver.model.Constants;
import com.example.safezonedriver.model.PushNotification;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.Headers;
import retrofit2.http.POST;
import com.example.safezonedriver.model.insertNotificationResponse;


public interface ApiInterface {

    @FormUrlEncoded
    @POST("insertNotification.php")
    Call<insertNotificationResponse> insertNotification(
            @Field("notification_content") String notificationContent,
            @Field("date") String date,
            @Field("time") String time
    );

    @Headers({
            "Authorization: Key="+ Constants.SERVER_KEY,
            "Content-Type: "+Constants.CONTENT_TYPE
    })
    @POST("fcm/send")
    Call<PushNotification> sendNotification(
            @Body PushNotification notification
    );

}