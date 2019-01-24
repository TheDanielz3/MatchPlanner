package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Evento;

public class MainViewActivity extends AppCompatActivity
{
    private Button buttonSeeProfile;
    private Evento evento;


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
                Intent intent = new Intent(MainViewActivity.this, ProfileActivity.class);
                openActivity(intent);
            }
        });
    }

    //Abre atividade ProfileActivity e é usada para as outras atividades
    public void openActivity(Intent x)
    {
        startActivity(x);
    }

    public void onclickCreateEvent(View view) {

        Intent intent = new Intent(this,CreateEventActivity.class);


        startActivity(intent);

    }
}
