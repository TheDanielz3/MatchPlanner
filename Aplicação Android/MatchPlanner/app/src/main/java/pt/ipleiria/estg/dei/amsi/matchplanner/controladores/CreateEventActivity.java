package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.inputmethodservice.Keyboard;
import android.support.design.widget.TextInputEditText;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import java.util.Date;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Evento;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.SingletonMatchplanner;

public class CreateEventActivity extends AppCompatActivity {
    private int id_eventTemp;
    private TextInputEditText event_nameTemp;
    private TextInputEditText begin_dateTemp;
    private TextInputEditText end_dateTemp;
    private TextInputEditText description_eventTemp;
    private int user_idTemp;
    private int team_idTemp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_event);

        event_nameTemp = findViewById(R.id.textinput_Eventname);
        begin_dateTemp = findViewById(R.id.textinput_Begindate);
        end_dateTemp = findViewById(R.id.textinput_Enddate);
        description_eventTemp = findViewById(R.id.textinput_Description);

    }


    public void createEvent(View view) {

        //Verificar tudo antes
        if (event_nameTemp.getText().length() == 0) {
            event_nameTemp.setError(getString(R.string.Erro_vazio));
            return;

        } else {
            if (begin_dateTemp.getText().length() == 0) {
                begin_dateTemp.setError(getString(R.string.Erro_vazio));
                return;

            } else {
                if (end_dateTemp.getText().length() == 0) {
                    end_dateTemp.setError(getString(R.string.Erro_vazio));
                    return;

                } else {
                    if (description_eventTemp.getText().length() == 0) {
                        description_eventTemp.setError(getString(R.string.Erro_vazio));
                        return;
                    }
                }
            }
        }

        //Dar get atraves da api
        id_eventTemp = 1;

        team_idTemp = 1;

        user_idTemp = 1;

        Evento novoevento = new Evento(id_eventTemp,
                event_nameTemp.getText().toString(),
                begin_dateTemp.getText().toString(),
                end_dateTemp.getText().toString(),
                description_eventTemp.getText().toString(),
                user_idTemp,
                team_idTemp);


        //Toast para informar ao utilizador que o evento foi criado
        Toast.makeText(this, "Foi Valido o EVENT", Toast.LENGTH_SHORT).show();
        SingletonMatchplanner.getInstance().adicionarEventoBD(novoevento);
        Intent intent = new Intent(this, MainViewActivity.class);

        startActivity(intent);
    }
}

