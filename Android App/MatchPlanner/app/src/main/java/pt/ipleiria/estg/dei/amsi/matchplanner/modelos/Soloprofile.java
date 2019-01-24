package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import android.text.Editable;

public class Soloprofile
{
    public long id;
    public String firstname;
    public String surnames;
    public String email;
    public String birthdate;
    public String sex;
    public String username;
    public String password;

    public Soloprofile(String firstname, String surnames, String email, String birthdate, String sex, String username, String password)
    {
        this.firstname = firstname;
        this.surnames = surnames;
        this.email = email;
        this.birthdate = birthdate;
        this.sex = sex;
        this.username = username;
        this.password = password;
    }

    public long getId()
    {
        return id;
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

    public String getEmail()
    {
        return email;
    }

    public void setEmail(String email)
    {
        this.email = email;
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
