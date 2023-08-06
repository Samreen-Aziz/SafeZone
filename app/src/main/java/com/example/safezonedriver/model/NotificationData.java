package com.example.safezonedriver.model;

public class NotificationData {
    private String title;
    private String message;
    private String date;
    private String time;

    public NotificationData(String title, String message, String date, String time) {
        this.title = title;
        this.message = message;
        this.date = date;
        this.time = time;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
    }
}