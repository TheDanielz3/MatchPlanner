package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

public class Post
{
    public long id;
    public String title;
    public String content;
    public String tag;
    public String create_time;
    public String image;

    public Post(String title, String content, String tag, String create_time, String image)
    {
        this.title = title;
        this.content = content;
        this.tag = tag;
        this.create_time = create_time;
        this.image = image;
    }

    public long getId()
    {
        return id;
    }

    public void setId(long id)
    {
        this.id = id;
    }

    public String getTitle()
    {
        return title;
    }

    public void setTitle(String title)
    {
        this.title = title;
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

    public String getImage()
    {
        return image;
    }

    public void setImage(String image)
    {
        this.image = image;
    }
}
