package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Teamprofile;

public class TeamSignUpActivity extends AppCompatActivity
{
    private TextView textViewSignIn;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_team_sign_up);

        textViewSignIn = findViewById(R.id.textViewSignIn);

        textViewSignIn.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(TeamSignUpActivity.this, LoginActivity.class);
                startActivity(intent);
            }
        });
    }
}
