//Classe usada para manter uma única instância de acesso aos dados

package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import android.content.Context;

import java.util.ArrayList;

public class SingletonMatchPlanner
{
    private static SingletonMatchPlanner INSTANCE = null;

    private ArrayList<Soloprofile> soloprofiles;
    private MatchPlannerBDHelper soloprofilesDB;

    private ArrayList<Teamprofile> teamprofiles;
    private MatchPlannerBDHelper teamprofileDB;

    private ArrayList<Event> events;
    private MatchPlannerBDHelper eventoDB;

    private ArrayList<Post> posts;
    private MatchPlannerBDHelper postDB;

    private ArrayList<Comment> comments;
    private MatchPlannerBDHelper commentDB;

    private MatchPlannerBDHelper db;

    public static synchronized SingletonMatchPlanner getInstance(Context context)
    {
        if (INSTANCE == null)
        {
            INSTANCE = new SingletonMatchPlanner(context);
        }

        return INSTANCE;
    }

    private SingletonMatchPlanner(Context context)
    {
        soloprofiles = new ArrayList<>();
        soloprofilesDB = new MatchPlannerBDHelper(context);
        teamprofiles = new ArrayList<>();
        teamprofileDB = new MatchPlannerBDHelper(context);
        events = new ArrayList<>();
        eventoDB = new MatchPlannerBDHelper(context);
        posts = new ArrayList<>();
        postDB = new MatchPlannerBDHelper(context);
        comments = new ArrayList<>();
        commentDB = new MatchPlannerBDHelper(context);
    }

    public ArrayList<Soloprofile> getSoloprofilesDB()
    {
        soloprofiles = soloprofilesDB.getAllSoloprofilesBD();

        return soloprofiles;
    }

    //Retorna solo profile com o id indicado
    public Soloprofile getSProfileByID(long id)
    {
        for(Soloprofile soloprofile: soloprofiles)
        {
            if(soloprofile.getId() == id)
            {
                return soloprofile;
            }
        }

        return null;
    }

    //Adiciona SoloProfile à DB
    public void addSProfileDB(Soloprofile soloprofile)
    {
        soloprofilesDB.addSProfileToBD(soloprofile);
    }

    //Remove SoloProfile à DB
    public void removerSProfileDB(long userID)
    {
        if(soloprofilesDB.deleteSProfileDB(userID))
        {
            Soloprofile soloprofile = getSProfileByID(userID);
            soloprofiles.remove(soloprofile);
        }
    }

    public ArrayList<Teamprofile> getTeamprofilesDB()
    {
        teamprofiles = teamprofileDB.getAllTeamprofilesBD();

        return teamprofiles;
    }

    //Retorna um team profile
    public Teamprofile getTProfileByID(long id)
    {
        for(Teamprofile teamprofile: teamprofiles)
        {
            if(teamprofile.getId() == id)
            {
                return teamprofile;
            }
        }

        return null;
    }

    public ArrayList<Event> getEvents()
    {
        events = eventoDB.getAllEventosBD();

        return events;
    }

    //Retorna um evento
    public Event getEventosByID(long id)
    {
        for(Event event: events)
        {
            if(event.getId() == id)
            {
                return event;
            }
        }

        return null;
    }

    public ArrayList<Post> getPosts()
    {
        posts = postDB.getAllPostsBD();

        return posts;
    }

    //Retorna um post
    public Post getPostByID(long id)
    {
        for(Post post: posts)
        {
            if(post.getId() == id)
            {
                return post;
            }
        }

        return null;
    }

    public ArrayList<Comment> getComments()
    {
        comments = commentDB.getAllCommentsBD();

        return comments;
    }

    //Retorna um comment
    public Comment getCommentByID(long id)
    {
        for(Comment comment: comments)
        {
            if(comment.getId() == id)
            {
                return comment;
            }
        }

        return null;
    }
}
