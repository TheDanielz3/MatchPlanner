package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.SingletonMatchPlanner;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;

public class UserViewActivity extends AppCompatActivity
{
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_view);
        setTitle("User View");

        //Objeto que vem da mainView
        final Soloprofile soloprofile = (Soloprofile) getIntent().getSerializableExtra("novoSoloProfile");

        final EditText editTextFirstname = findViewById(R.id.editTextFirstName);
        final EditText editTextSurnames = findViewById(R.id.editTextLastName);
        final EditText editTextEmail = findViewById(R.id.editTextEmail);
        final EditText editTextSex = findViewById(R.id.editTextSex);
        final EditText editTextBirthdate = findViewById(R.id.editTextBirthDate);
        final EditText editTetxUsername = findViewById(R.id.editTextUsername);

        final Button btnGoBack = findViewById(R.id.buttonGoBack);

        final FloatingActionButton fabEditProfile = findViewById(R.id.fabEditProfile);

        editTextFirstname.setText(soloprofile.firstname);
        editTextSurnames.setText(soloprofile.surnames);
        editTextEmail.setText(soloprofile.email);
        editTextSex.setText(soloprofile.sex);
        editTextBirthdate.setText(soloprofile.birthdate);
        editTetxUsername.setText(soloprofile.username);

        fabEditProfile.setImageResource(R.mipmap.ic_save);
        fabEditProfile.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                soloprofile.firstname = editTextFirstname.getText().toString();
                soloprofile.surnames = editTextSurnames.getText().toString();
                soloprofile.email = editTextEmail.getText().toString();
                soloprofile.sex = editTextSex.getText().toString();
                soloprofile.birthdate = editTextBirthdate.getText().toString();
                soloprofile.username = editTetxUsername.getText().toString();

                SingletonMatchPlanner.getInstance(getApplicationContext()).updateSProfileDB(soloprofile);
            }
        });

        btnGoBack.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(getApplicationContext(), SProfileMainViewActivity.class);
                intent.putExtra("novoSoloProfile", soloprofile);

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

    @Override
    public void onBackPressed()
    {
    }
}
