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

import static android.Manifest.permission.READ_CONTACTS;

/**
 * A login screen that offers login via email/password.
 */
public class LoginActivity extends AppCompatActivity
{
    private Button buttonNewUser;

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

        buttonNewUser = findViewById(R.id.buttonNewUser);

        buttonNewUser.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(LoginActivity.this, ProfileActivity.class);
                startActivity(intent);
            }
        });

        // Set up the login form.
        mUsername = (EditText) findViewById(R.id.username);
        mPasswordView = (EditText) findViewById(R.id.password);

        mPasswordView.setOnEditorActionListener(new TextView.OnEditorActionListener()
        {
            @Override
            public boolean onEditorAction(TextView textView, int id, KeyEvent keyEvent)
            {
                if (id == EditorInfo.IME_ACTION_DONE || id == EditorInfo.IME_NULL)
                {
                    attemptLogin(mUsername, mPasswordView);
                    return true;
                }

                return false;
            }
        });

        Button mEmailSignInButton = (Button) findViewById(R.id.email_sign_in_button);

        mEmailSignInButton.setOnClickListener(new OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
                attemptLogin(mUsername, mPasswordView);
            }
        });

        mLoginFormView = findViewById(R.id.login_form);
        mProgressView = findViewById(R.id.login_progress);
    }

    public void attemptLogin(EditText username, EditText password)
    {
        //Atividade principal do perfil (criar eventos, etc)
        Intent intent = new Intent(this, ProfileActivity.class);

        //Verifica se campos estão vazios
        if(TextUtils.isEmpty(username.getText().toString()))
        {
            Toast.makeText(getApplicationContext(), "Username field is empty!", Toast.LENGTH_SHORT).show();
        }
        else if(TextUtils.isEmpty(password.getText().toString()))
        {
            Toast.makeText(getApplicationContext(), "Password field is empty!", Toast.LENGTH_SHORT).show();
        }

        //Caso dados estão preenchidos e válidos entra no intent
        if(!TextUtils.isEmpty(username.getText().toString()) && !TextUtils.isEmpty(password.getText().toString()))
        {
            startActivity(intent);
        }
    }
}