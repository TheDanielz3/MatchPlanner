package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import java.io.Serializable;

public class Event implements Serializable
{
    public long id;
    public String event_name;
    public String begin_date;
    public String end_date;
    public String description;

    public long team_id;

    public Event(String event_name, String begin_date, String end_date, String description)
    {
        this.event_name = event_name;
        this.begin_date = begin_date;
        this.end_date = end_date;
        this.description = description;
    }

    public long getId()
    {
        return id;
    }

    public String getEvent_name()
    {
        return event_name;
    }

    public void setEvent_name(String event_name)
    {
        this.event_name = event_name;
    }

    public String getBegin_date()
    {
        return begin_date;
    }

    public void setBegin_date(String begin_date)
    {
        this.begin_date = begin_date;
    }

    public String getEnd_date()
    {
        return end_date;
    }

    public void setEnd_date(String end_date)
    {
        this.end_date = end_date;
    }

    public String getDescription()
    {
        return description;
    }

    public void setDescription(String description)
    {
        this.description = description;
    }
}
