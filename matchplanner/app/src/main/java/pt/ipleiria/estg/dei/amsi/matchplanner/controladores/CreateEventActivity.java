package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Event;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.SingletonMatchPlanner;

public class CreateEventActivity extends AppCompatActivity
{
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_event);
        setTitle("Create Event");

        final TextView textViewCreateEvent = findViewById(R.id.textViewCreateEvent);

        final EditText event_name = findViewById(R.id.editTextEventName);
        final EditText begin_date = findViewById(R.id.editTextBeginDate);
        final EditText end_date = findViewById(R.id.editTextEndDate);
        final EditText description = findViewById(R.id.editTextDescription);

        Button btnGoBack = findViewById(R.id.buttonGoBack);

        final Button btnCreateEvent = findViewById(R.id.buttonCreateEvent);
        final Button btnCPost = findViewById(R.id.buttonCreatePost);
        Button btnCreateComment = findViewById(R.id.buttonCreateComment);

        btnGoBack.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(getApplicationContext(), SProfileMainViewActivity.class);
                startActivity(intent);
            }
        });

        btnCreateEvent.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                createEvent(event_name, begin_date, end_date, description);
                btnCreateEvent.setVisibility(View.INVISIBLE);
                textViewCreateEvent.setVisibility(View.INVISIBLE);
            }
        });

        btnCPost.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(getApplicationContext(), CreatePostActivity.class);

                startActivity(intent);
            }
        });
    }

    public void createEvent(EditText eventName, EditText begin_date, EditText end_date, EditText description)
    {
        Event newEvent = new Event(eventName.getText().toString(), begin_date.getText().toString(),
                end_date.getText().toString(), description.getText().toString());

        //Verifica se campos estão preenchidos corretamente
        /*if(TextUtils.isEmpty(eventName.getText().toString()))
        {
            eventName.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(begin_date.getText().toString()))
        {
            begin_date.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(end_date.getText().toString()))
        {
            end_date.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(description.getText().toString()))
        {
            description.setError(getString(R.string.Erro_C_Vazio));

            return;
        }

        //Verifica se campos estão de acordo com o pretendido (num caracteres)
        if(eventName.length() < 1 || eventName.length() > 50)
        {
            eventName.setError("Firstname must have more than 1 character until 50!");

            return;
        }
        else
        {
            eventName.setError(null);
        }

        if(description.length() < 1 || description.length() > 500)
        {
            description.setError("Event description must have more than 1 character until 500!");
        }
        else
        {
            description.setError(null);
        }*/

        newEvent.event_name = "Teste";
        newEvent.begin_date = "12/01/2018";
        newEvent.end_date = "13/01/2018";
        newEvent.description = "Evento teste";

        SingletonMatchPlanner.getInstance(getApplicationContext()).addEventDB(newEvent);

        eventName.setText(newEvent.event_name);
        begin_date.setText(newEvent.begin_date);
        end_date.setText(newEvent.end_date);
        description.setText(newEvent.description);

        setTitle("Event " + newEvent.event_name);
    }
}
