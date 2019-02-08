package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import java.io.Serializable;

public class Teamprofile implements Serializable
{
    public long id;
    public String team_name;
    public String member1;
    public String member2;
    public String member3;
    public String member4;
    public String member5;
    public String member6;
    public String username;
    public String password;

    public Teamprofile(long id, String team_name, String member1, String member2, String member3, String member4, String member5, String member6, String username, String password)
    {
        this.id = id;
        this.team_name = team_name;
        this.member1 = member1;
        this.member2 = member2;
        this.member3 = member3;
        this.member4 = member4;
        this.member5 = member5;
        this.member6 = member6;
        this.username = username;
        this.password = password;
    }

    public long getId()
    {
        return id;
    }

    public String getTeam_name()
    {
        return team_name;
    }

    public void setTeam_name(String team_name)
    {
        this.team_name = team_name;
    }

    public String getMember1()
    {
        return member1;
    }

    public void setMember1(String member1)
    {
        this.member1 = member1;
    }

    public String getMember2()
    {
        return member2;
    }

    public void setMember2(String member2)
    {
        this.member2 = member2;
    }

    public String getMember3()
    {
        return member3;
    }

    public void setMember3(String member3)
    {
        this.member3 = member3;
    }

    public String getMember4()
    {
        return member4;
    }

    public void setMember4(String member4)
    {
        this.member4 = member4;
    }

    public String getMember5()
    {
        return member5;
    }

    public void setMember5(String member5)
    {
        this.member5 = member5;
    }

    public String getMember6()
    {
        return member6;
    }

    public void setMember6(String member6)
    {
        this.member6 = member6;
    }

    public String getUsername()
    {
        return username;
    }

    public void setUsername(String username)
    {
        this.username = username;
    }

    public String getPassword()
    {
        return password;
    }

    public void setPassword(String password)
    {
        this.password = password;
    }
}
