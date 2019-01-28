package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

public class Comment
{
    public int id;
    public String content;
    public String tag;
    public String create_time;
    public int user_id;
    public int team_id;
    public int event_id;
    public int post_id;

    public String getContent()
    {
        return content;
    }

    public void setContent(String content)
    {
        this.content = content;
    }

    public String getTag()
    {
        return tag;
    }

    public void setTag(String tag)
    {
        this.tag = tag;
    }

    public String getCreate_time()
    {
        return create_time;
    }

    public void setCreate_time(String create_time)
    {
        this.create_time = create_time;
    }

    public int getUser_id()
    {
        return user_id;
    }

    public void setUser_id(int user_id)
    {
        this.user_id = user_id;
    }

    public int getTeam_id()
    {
        return team_id;
    }

    public void setTeam_id(int team_id)
    {
        this.team_id = team_id;
    }

    public int getEvent_id()
    {
        return event_id;
    }

    public void setEvent_id(int event_id)
    {
        this.event_id = event_id;
    }

    public int getPost_id()
    {
        return post_id;
    }

    public void setPost_id(int post_id)
    {
        this.post_id = post_id;
    }
}