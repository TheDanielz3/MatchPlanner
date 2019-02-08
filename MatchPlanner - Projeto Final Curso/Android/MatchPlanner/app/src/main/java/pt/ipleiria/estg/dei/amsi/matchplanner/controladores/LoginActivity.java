package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.animation.Animator;
import android.animation.AnimatorListenerAdapter;
import android.annotation.TargetApi;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.support.annotation.NonNull;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.app.LoaderManager.LoaderCallbacks;

import android.content.CursorLoader;
import android.content.Loader;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;

import android.os.Build;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.text.TextUtils;
import android.view.KeyEvent;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.inputmethod.EditorInfo;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import org.w3c.dom.Text;

import java.util.ArrayList;
import java.util.List;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.MatchPlannerBDHelper;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.SingletonMatchPlanner;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;

import static android.Manifest.permission.READ_CONTACTS;

/**
 * A login screen that offers login via email/password.
 */
public class LoginActivity extends AppCompatActivity
{
    private Button buttonNewUser;
    private Button buttonSignIn;

    // UI references.
    private EditText mUsername;
    private EditText mPasswordView;
    private View mProgressView;
    private View mLoginFormView;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);

        //Atribui o layout específico para a atividade login
        setContentView(R.layout.activity_login);

        buttonSignIn = findViewById(R.id.buttonSignIn);
        buttonNewUser = findViewById(R.id.buttonNewUser);

        // Set up the login form.
        mUsername = (EditText) findViewById(R.id.username);
        mPasswordView = (EditText) findViewById(R.id.password);

        buttonSignIn.setOnClickListener(new OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                //Atividade principal do perfil (criar eventos, etc)
                //ArrayList<Soloprofile> soloprofiles = SingletonMatchPlanner.getInstance(getApplicationContext()).getSoloprofilesDB();

                //Verifica se campos estão vazios
                if(TextUtils.isEmpty(mUsername.getText().toString()))
                {
                    Toast.makeText(getApplicationContext(), "Username field is empty!", Toast.LENGTH_LONG).show();
                }
                else if(TextUtils.isEmpty(mPasswordView.getText().toString()))
                {
                    Toast.makeText(getApplicationContext(), "Password field is empty!", Toast.LENGTH_LONG).show();
                }

                //Caso dados estão preenchidos e válidos entra no intent
                if(!TextUtils.isEmpty(mUsername.getText().toString()) && !TextUtils.isEmpty(mPasswordView.getText().toString()))
                {
                    if(SingletonMatchPlanner.getInstance(getApplicationContext()).getSProfileByUsername(mUsername.getText().toString()) != null)
                    {
                        Toast.makeText(getApplicationContext(), "Valid", Toast.LENGTH_LONG).show();
                    }
                    else
                    {
                        Toast.makeText(getApplicationContext(), "Invalid username", Toast.LENGTH_LONG).show();
                    }
                }
            }
        });

        buttonNewUser.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(LoginActivity.this, ProfileActivity.class);
                startActivity(intent);
            }
        });

        mLoginFormView = findViewById(R.id.login_form);
        mProgressView = findViewById(R.id.login_progress);
    }
}