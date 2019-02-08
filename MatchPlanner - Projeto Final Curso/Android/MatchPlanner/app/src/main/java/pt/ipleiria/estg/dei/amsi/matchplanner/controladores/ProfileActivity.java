package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;

public class ProfileActivity extends AppCompatActivity
{
    private Button buttonSolo;
    private Button buttonTeam;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);
        setTitle("Profiles");

        //getActionBar().setHomeButtonEnabled(true);

        buttonSolo = findViewById(R.id.buttonSolo);

        buttonSolo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(ProfileActivity.this, SoloSignUpActivity.class);
                startActivity(intent);
            }
        });

        buttonTeam = findViewById(R.id.buttonTeam);

        buttonTeam.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
            }
        });
    }
}
