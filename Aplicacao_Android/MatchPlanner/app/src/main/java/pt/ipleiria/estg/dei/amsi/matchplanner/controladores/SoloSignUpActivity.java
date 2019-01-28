package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;

public class SoloSignUpActivity extends AppCompatActivity
{
    private TextView textViewSignIn;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_solo_sign_up);

        textViewSignIn = findViewById(R.id.textViewSignIn);

        textViewSignIn.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent intent = new Intent(SoloSignUpActivity.this, LoginActivity.class);
                startActivity(intent);
            }
        });
    }
}
