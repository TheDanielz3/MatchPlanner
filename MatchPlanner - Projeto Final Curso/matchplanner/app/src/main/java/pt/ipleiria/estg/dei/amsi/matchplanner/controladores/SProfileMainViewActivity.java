package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.adapters.EventAdapter;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Event;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.SingletonMatchPlanner;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;

public class SProfileMainViewActivity extends AppCompatActivity
{
    private Button buttonSeeProfile;
    private Button buttonCreateEvent;
    private ArrayList events;
    private ListView listView;
    private EventAdapter eventAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_view_s);
        setTitle("Welcome to MatchPlanner");

        buttonSeeProfile = findViewById(R.id.buttonSeeProfile);
        buttonCreateEvent = findViewById(R.id.buttonCreateEvent);
        listView = findViewById(R.id.listviewEventos);

        //Objeto que vem do sign up
        final Soloprofile soloprofile = (Soloprofile) getIntent().getSerializableExtra("novoSoloProfile");
        final Event event = (Event) getIntent().getSerializableExtra("event");

        TextView textViewBV = findViewById(R.id.textViewBV);
        textViewBV.setText("Welcome to MatchPlanner " + soloprofile.firstname + "!" + "\n" + "Choose what you want to do");

        buttonSeeProfile.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(getApplicationContext(), UserViewActivity.class);
                intent.putExtra("novoSoloProfile", soloprofile);

                startActivity(intent);
            }
        });

        buttonCreateEvent.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(getApplicationContext(), CreateEventActivity.class);

                startActivity(intent);
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu)
    {
        MenuInflater inflater = getMenuInflater();
        // Inflate the menu; this adds items to the action bar if it is present.
        inflater.inflate(R.menu.menu, menu);

        return true;
    }

    public boolean onOptionsItemSelected(MenuItem item)
    {
        switch(item.getItemId())
        {
            case R.id.logout:
                Intent intent = new Intent(getApplicationContext(), LoginActivity.class);
                startActivity(intent);
                return true;

            default:
                return super.onOptionsItemSelected(item);
        }
    }
}