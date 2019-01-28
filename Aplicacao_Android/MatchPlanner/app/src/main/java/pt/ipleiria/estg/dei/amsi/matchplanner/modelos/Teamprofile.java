package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

public class Teamprofile
{
    public int id;
    public String team_name;
    public String members;

    public void setTeam_name(String team_name)
    {
        this.team_name = team_name;
    }

    public String getTeam_name()
    {
        return team_name;
    }

    public void setMembers(String members)
    {
        this.members = members;
    }

    public String getMembers()
    {
        return members;
    }
}
