package pt.ipleiria.estg.dei.amsi.matchplanner;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainView extends AppCompatActivity
{
    private Button buttonSeeProfile;

    private Intent intent = new Intent(MainView.this, ProfileActivity.class);

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
                //TODO: Abaixo: método openActivity() não reconhecido
                //openActivity(intent);
            }
        });
    }
}
