package pt.ipleiria.estg.dei.amsi.matchplanner.controladores;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Comment;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Event;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.SingletonMatchPlanner;

public class CreateCommentActivity extends AppCompatActivity
{

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_comment);

        final EditText editTextCommentContent = findViewById(R.id.editTextCommentContent);
        final EditText editTextCommentTag = findViewById(R.id.editTextCommentTag);

        Button btnGoBack = findViewById(R.id.buttonGoBack);
        Button btnCreateComment = findViewById(R.id.buttonCreateComment);

        btnCreateComment.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                createComment(editTextCommentContent, editTextCommentTag);
            }
        });
    }

    public void createComment(EditText commentContent, EditText commentTag)
    {
        Comment newComment = new Comment(commentContent.getText().toString(), commentTag.getText().toString());

        //Verifica se campos estão preenchidos corretamente
        if(TextUtils.isEmpty(commentContent.getText().toString()))
        {
            commentContent.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(commentTag.getText().toString()))
        {
            commentTag.setError(getString(R.string.Erro_C_Vazio));

            return;
        }

        if(commentContent.length() < 1 || commentContent.length() > 500)
        {
            commentContent.setError("Comment content must have more than 1 character until 1000!");
        }
        else
        {
            commentContent.setError(null);
        }

        if(commentTag.length() < 1 || commentTag.length() > 70)
        {
            commentTag.setError("Comment tag must have more than 1 character until 70!");
        }
        else
        {
            commentContent.setError(null);
        }

        //Formatador da data
        DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
        Date date = new Date();

        newComment.content = "Teste";
        newComment.tag = "Tag";
        newComment.create_time = dateFormat.format(date);

        SingletonMatchPlanner.getInstance(getApplicationContext()).addCommentDB(newComment);
    }
}
