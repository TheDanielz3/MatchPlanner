package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

public class Soloprofile
{
    public int $id;
    public String firstname;
    public String surnames;
    public String birthdate;
    public String sex;
    public int team_id;

    public int get$id()
    {
        return $id;
    }

    public void set$id(int $id)
    {
        this.$id = $id;
    }

    public String getFirstname()
    {
        return firstname;
    }

    public void setFirstname(String firstname)
    {
        this.firstname = firstname;
    }

    public String getSurnames()
    {
        return surnames;
    }

    public void setSurnames(String surnames)
    {
        this.surnames = surnames;
    }

    public String getBirthdate()
    {
        return birthdate;
    }

    public void setBirthdate(String birthdate)
    {
        this.birthdate = birthdate;
    }

    public String getSex()
    {
        return sex;
    }

    public void setSex(String sex)
    {
        this.sex = sex;
    }

    public int getTeam_id()
    {
        return team_id;
    }

    public void setTeam_id(int team_id)
    {
        this.team_id = team_id;
    }
}
