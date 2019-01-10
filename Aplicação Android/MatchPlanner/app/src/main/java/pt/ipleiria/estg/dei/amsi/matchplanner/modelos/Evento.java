package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import java.util.Date;

public class Evento
{

    public int id_event;
    public String event_name;
    public String begin_date;
    public String end_date;
    public String description_event;
    public int user_id;
    public int team_id;


    public int getId_event() {
        return id_event;
    }

    public void setId_event(int id_event) {
        this.id_event = id_event;
    }

    public String getEvent_name() {
        return event_name;
    }

    public void setEvent_name(String event_name) {
        this.event_name = event_name;
    }

    public String getBegin_date() {
        return begin_date;
    }

    public void setBegin_date(String begin_date) {
        this.begin_date = begin_date;
    }

    public String getEnd_date() {
        return end_date;
    }

    public void setEnd_date(String end_date) {
        this.end_date = end_date;
    }

    public String getDescription_event() {
        return description_event;
    }

    public void setDescription_event(String description_event) {
        this.description_event = description_event;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public int getTeam_id() {
        return team_id;
    }

    public void setTeam_id(int team_id) {
        this.team_id = team_id;
    }

    public Evento(int id_event, String event_name, String begin_date, String end_date, String description_event, int user_id, int team_id) {
        this.id_event = id_event;
        this.event_name = event_name;
        this.begin_date = begin_date;
        this.end_date = end_date;
        this.description_event = description_event;
        this.user_id = user_id;
        this.team_id = team_id;
    }
}
