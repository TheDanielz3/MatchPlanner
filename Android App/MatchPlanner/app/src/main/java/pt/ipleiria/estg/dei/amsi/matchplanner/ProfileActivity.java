package pt.ipleiria.estg.dei.amsi.matchplanner;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class ProfileActivity extends AppCompatActivity
{
    private Button buttonSolo;
    private Button buttonTeam;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        buttonSolo = findViewById(R.id.buttonSolo);

        buttonSolo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                openSoloSignUpActivity();
            }
        });

        buttonTeam = findViewById(R.id.buttonTeam);

        buttonTeam.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                openTeamSignUpActivity();
            }
        });
    }

    //Abre atividade ProfileActivity
    public void openSoloSignUpActivity()
    {
        Intent intent = new Intent(ProfileActivity.this, SoloSignUpActivity.class);
        startActivity(intent);
    }

    public void openTeamSignUpActivity()
    {
        Intent intent = new Intent(ProfileActivity.this, TeamSignUpActivity.class);
        startActivity(intent);
    }
}
