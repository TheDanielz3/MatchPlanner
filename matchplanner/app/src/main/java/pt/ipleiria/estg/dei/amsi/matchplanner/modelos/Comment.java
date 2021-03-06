package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import java.io.Serializable;

public class Comment implements Serializable
{
    public long id;
    public String content;
    public String tag;
    public String create_time;

    public Comment(String content, String tag)
    {
        this.content = content;
        this.tag = tag;
    }

    public long getId()
    {
        return id;
    }

    public void setId(long id)
    {
        this.id = id;
    }

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
}