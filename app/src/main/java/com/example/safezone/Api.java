package com.example.safezone;

import com.example.safezone.ModelResponse.LoginResponse;
import com.example.safezone.ModelResponse.ReportingResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface Api {

    @FormUrlEncoded
    @POST("login.php")
    Call<LoginResponse> login(
            @Field("id") String id,
            @Field("password") String password
    );
    @FormUrlEncoded
    @POST("sendReport.php")
    Call<ReportingResponse> reporting(
            @Field("p_id") String p_id,
            @Field("report_type") String report_type,
            @Field("parent_status") String parent_status,
            @Field("content") String content
    );

}
