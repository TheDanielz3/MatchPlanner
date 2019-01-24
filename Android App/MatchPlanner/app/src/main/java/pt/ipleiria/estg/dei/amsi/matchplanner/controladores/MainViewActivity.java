package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;

public class MainViewActivity extends AppCompatActivity
{
    private Button buttonSeeProfile;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_view);

        buttonSeeProfile = findViewById(R.id.buttonSeeProfile);

        buttonSeeProfile.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
            }
        });
    }
}
