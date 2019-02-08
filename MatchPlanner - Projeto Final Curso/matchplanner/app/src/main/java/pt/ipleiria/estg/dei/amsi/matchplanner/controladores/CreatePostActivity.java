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
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Event;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Post;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.SingletonMatchPlanner;

public class CreatePostActivity extends AppCompatActivity
{

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_post);

        final EditText editTextPostTitle = findViewById(R.id.editTextPostTitle);
        final EditText editTextPostContent = findViewById(R.id.editTextPostContent);
        final EditText editTextPostTag = findViewById(R.id.editTextPostTag);

        Button btnCreatePost = findViewById(R.id.buttonCreatePost);
        Button btnGoBack = findViewById(R.id.buttonGoBack);

        btnCreatePost.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                createPost(editTextPostTitle, editTextPostContent, editTextPostTag);
            }
        });
    }

    public void createPost(EditText PostTitle, EditText PostContent, EditText PostTag)
    {
        Post newPost = new Post(PostTitle.getText().toString(), PostContent.getText().toString(),
                PostTag.getText().toString());

        //Verifica se campos estão preenchidos corretamente
        /*if(TextUtils.isEmpty(PostTitle.getText().toString()))
        {
            PostTitle.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(PostContent.getText().toString()))
        {
            PostContent.setError(getString(R.string.Erro_C_Vazio));

            return;
        }
        else if(TextUtils.isEmpty(PostTag.getText().toString()))
        {
            PostTag.setError(getString(R.string.Erro_C_Vazio));

            return;
        }

        //Verifica se campos estão de acordo com o pretendido (num caracteres)
        if(PostTitle.length() < 1 || PostTitle.length() > 70)
        {
            PostTitle.setError("Post Title must have more than 1 character until 70!");

            return;
        }
        else
        {
            PostTitle.setError(null);
        }

        if(PostContent.length() < 1 || PostContent.length() > 1000)
        {
            PostContent.setError("Post Content must have more than 1 character until 1000!");
        }
        else
        {
            PostContent.setError(null);
        }

        if(PostTag.length() < 1 || PostContent.length() > 70)
        {
            PostContent.setError("Post Tag must have more than 1 character until 70!");
        }
        else
        {
            PostContent.setError(null);
        }*/

        //Formatador da data
        DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
        Date date = new Date();

        newPost.title = "Teste";
        newPost.content = "Teste Content";
        newPost.tag = "Tag";
        newPost.image = "";
        newPost.create_time = dateFormat.format(date);      //Igual a hora da máquina

        SingletonMatchPlanner.getInstance(getApplicationContext()).addPostDB(newPost);
    }
}
