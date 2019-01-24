package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.app.Activity;
import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.Parcelable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.CalendarView;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.DatePicker;

import java.io.Serializable;
import java.time.Year;
import java.util.Calendar;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;

public class SoloSignUpActivity extends AppCompatActivity
{
    private EditText editTextFirstname;
    private EditText editTextSurnames;
    private EditText editTextEmail;
    private CheckBox checkBoxMale;
    private CheckBox checkBoxFemale;
    private EditText editTextSex;
    private EditText editTextBirthDate;

    private Button buttonBirthDate;

    private EditText editTextUsername;
    private EditText editTextPassword;
    private EditText editTextPasswordR; //Repetição da password
    private Button buttonSignUp;

    //TextView para voltar a atividade de login
    private TextView textViewSignIn;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_solo_sign_up);
        setTitle("Solo Profile Sign Up");

        editTextFirstname = (EditText) findViewById(R.id.editTextFirstName);
        editTextSurnames = (EditText) findViewById(R.id.editTextLastName); //Surnames
        editTextEmail = (EditText) findViewById(R.id.editTextEmail);
        checkBoxMale = (CheckBox) findViewById(R.id.checkBoxMale);
        checkBoxFemale = (CheckBox) findViewById(R.id.checkBoxFemale);
        editTextSex = findViewById(R.id.editTextSex);   //Passa checkbox clicada para texto
        editTextBirthDate = (EditText) findViewById(R.id.editTextBirthDate);
        editTextUsername = (EditText) findViewById(R.id.editTextUsername);
        editTextPassword = (EditText) findViewById(R.id.editTextPassword);
        editTextPasswordR = (EditText) findViewById(R.id.editTextRepeatPassword);

        //Click na checkbox male
        checkBoxMale.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                checkBoxFemale.setEnabled(false);
                editTextSex.setText("Male");

                if(!(checkBoxMale.isChecked()))
                {
                    checkBoxFemale.setEnabled(true);
                }
            }
        });

        //Click na checkbox female
        checkBoxFemale.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                checkBoxMale.setEnabled(false);
                editTextSex.setText("Female");

                if(!(checkBoxFemale.isChecked()))
                {
                    checkBoxMale.setEnabled(true);
                }
            }
        });

        //Link para voltar ao login
        textViewSignIn = findViewById(R.id.textViewSignIn);
        textViewSignIn.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(getApplicationContext(), LoginActivity.class);
                startActivity(intent);
            }
        });

        //Botão para fazer sign up
        buttonSignUp = findViewById(R.id.buttonSoloSignUp);
        buttonSignUp.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                SignUp(editTextFirstname, editTextSurnames, editTextEmail, editTextSex, editTextBirthDate, editTextUsername, editTextPassword, editTextPasswordR);
            }
        });

        buttonBirthDate = findViewById(R.id.buttonBirthDate);
        buttonBirthDate.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Calendar calendar = Calendar.getInstance();
                int year = calendar.get(Calendar.YEAR);
                int month = calendar.get(Calendar.MONTH);
                int dayOfMonth = calendar.get(Calendar.DAY_OF_MONTH);
                int minYear = 1900;
                int maxYear = Calendar.getInstance().get(Calendar.YEAR);

                DatePickerDialog datePickerDialog = new DatePickerDialog(SoloSignUpActivity.this, new DatePickerDialog.OnDateSetListener()
                {
                    @Override
                    public void onDateSet(DatePicker view, int year, int month, int dayOfMonth)
                    {
                        editTextBirthDate.setText(dayOfMonth + "/" + (month + 1) + "/" + year);
                    }
                },  year, month, dayOfMonth);

                datePickerDialog.getDatePicker().setMinDate(minYear);
                datePickerDialog.show();
            }
        });
    }

    public void SignUp(EditText firstname, EditText surnames, EditText email, EditText sex, EditText birthdate, EditText username, EditText password, EditText passowrdR)
    {
        //Verifica se campos estão preenchidos corretamente
        /*if(TextUtils.isEmpty(firstname.getText().toString()))
        {
            firstname.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(surnames.getText().toString()))
        {
            surnames.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(email.getText().toString()))
        {
            email.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(sex.getText().toString()))
        {
            sex.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(birthdate.getText().toString()))
        {
            birthdate.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(username.getText().toString()))
        {
            username.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(password.getText().toString()))
        {
            password.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(passowrdR.getText().toString()))
        {
            passowrdR.setError(getString(R.string.Erro_C_Vazio));

            return;
        }

        //Verifica se campos estão de acordo com o pretendido (num caracteres)
        if(firstname.length() < 6 || firstname.length() > 50)
        {
            firstname.setError("Firstname must have more than 6 characters until 50!");

            return;
        }
        else
        {
            firstname.setError(null);
        }

        if(surnames.length() < 6 || surnames.length() > 50)
        {
            surnames.setError("Surnames must have more than 6 characters until 50!");

            return;
        }
        else
        {
            surnames.setError(null);
        }

        if(email.length() < 5 || email.length() > 255)
        {
            email.setError("Email must have more than 5 characters until 256!");

            return;
        }
        else
        {
            email.setError(null);
        }

        if(username.length() < 1 || username.length() > 255)
        {
            username.setError("Username must have more than 1 characters until 255");

            return;
        }
        else
        {
            username.setError(null);
        }

        if(password.length() < 6 || passowrdR.length() > 255)
        {
            password.setError("Password must have more than 6 characters until 255");

            return;
        }
        else
        {
            password.setError(null);
        }

        //Verifica se passwords têm o mesmo texto
        if(!(password.getText().toString().equals(passowrdR.getText().toString())))
        {
            password.setError("Passwords must be equal!");

            return;
        }
        else
        {
            password.setError(null);
        }*/


        Intent intent = new Intent(getApplicationContext(), MainViewActivity.class);

        Soloprofile novoSoloProfile = new Soloprofile(editTextFirstname.getText().toString(), editTextSurnames.getText().toString(),
                editTextEmail.getText().toString(), editTextSex.getText().toString(), editTextBirthDate.getText().toString(),
                editTextUsername.getText().toString(), editTextPassword.getText().toString());

        startActivity(intent);
    }
}