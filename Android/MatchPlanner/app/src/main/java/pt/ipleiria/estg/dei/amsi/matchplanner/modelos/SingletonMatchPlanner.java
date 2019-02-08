//Classe usada para manter uma única instância de acesso aos dados

package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import android.content.Context;

import com.android.volley.RequestQueue;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.matchplanner.listeners.MatchPlannerListener;

public class SingletonMatchPlanner implements MatchPlannerListener
{
    private static SingletonMatchPlanner INSTANCE = null;

    private ArrayList<Soloprofile> soloprofiles;
    private ArrayList<Teamprofile> teamprofiles;
    private ArrayList<Event> events;
    private ArrayList<Post> posts;
    private ArrayList<Comment> comments;

    private MatchPlannerBDHelper db;

    private MatchPlannerListener matchPlannerListener;

    private static RequestQueue volleyQueue = null;
    private String myUrlAPIUsers = "";  //URL lista users yii

    public static synchronized SingletonMatchPlanner getInstance(Context context)
    {
        if (INSTANCE == null)
        {
            INSTANCE = new SingletonMatchPlanner(context);
        }

        return INSTANCE;
    }

    //Construtor do singleton
    private SingletonMatchPlanner(Context context)
    {
        soloprofiles = new ArrayList<>();
        teamprofiles = new ArrayList<>();
        events = new ArrayList<>();
        posts = new ArrayList<>();

        db = new MatchPlannerBDHelper(context);
    }

    public void setMatchPlannerListener(MatchPlannerListener matchPlannerListener)
    {
        this.matchPlannerListener = matchPlannerListener;
    }

    //Solo Profiles

    //Adiciona SoloProfile à DB
    public Soloprofile addSoloProfileDB(Soloprofile soloprofile)
    {
        db.addSProfileToBD(soloprofile);
        return soloprofile;
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

    //Retorna solo profile com o username indicado
    public Soloprofile getSProfileByUsername(String username)
    {
        for(Soloprofile soloprofile: soloprofiles)
        {
            if(username.equals(soloprofile.getUsername()))
            {
                return soloprofile;
            }
        }

        return null;
    }

    public ArrayList<Soloprofile> getSoloprofilesDB()
    {
        //soloprofiles = db.getAllSoloprofilesBD();

        return soloprofiles;
    }

    public void updateSProfileDB(Soloprofile soloprofile)
    {
        if(!soloprofiles.contains(soloprofile))
        {
            return;
        }

        Soloprofile auxSProfile = getSProfileByID(soloprofile.getId());

        auxSProfile.setFirstname(soloprofile.getFirstname());
        auxSProfile.setSurnames(soloprofile.getSurnames());
        auxSProfile.setEmail(soloprofile.getEmail());
        auxSProfile.setSex(soloprofile.getSex());
        auxSProfile.setBirthdate(soloprofile.getBirthdate());
        auxSProfile.setUsername(soloprofile.getUsername());
        auxSProfile.setPassword(soloprofile.getPassword());

        db.updateSoloProfileDB(auxSProfile);
    }

    //Remove SoloProfile à DB
    public void removerSProfileDB(long userID)
    {
        /*if(db.deleteSProfileDB(userID))
        {
            Soloprofile soloprofile = getSProfileByID(userID);
            soloprofiles.remove(soloprofile);
        }*/
    }

    //Team profiles

    //Adiciona TeamProfile à DB
    public void addTeamProfileDB(Teamprofile teamprofile)
    {
        db.addTProfileToBD(teamprofile);
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

    public ArrayList<Teamprofile> getTeamprofilesDB()
    {
        teamprofiles = db.getAllTeamprofilesBD();

        return teamprofiles;
    }

    public void updateTProfileDB(Teamprofile teamprofile)
    {
        //Caso não exista tal recurso
        if(!teamprofiles.contains(teamprofile))
        {
            return;
        }

        Teamprofile auxTProfile = getTProfileByID(teamprofile.getId());
        auxTProfile.setTeam_name(teamprofile.getTeam_name());
        auxTProfile.setMember1(teamprofile.getMember1());
        auxTProfile.setMember2(teamprofile.getMember2());
        auxTProfile.setMember3(teamprofile.getMember3());
        auxTProfile.setMember4(teamprofile.getMember4());
        auxTProfile.setMember5(teamprofile.getMember5());
        auxTProfile.setMember6(teamprofile.getMember6());
        auxTProfile.setUsername(teamprofile.getUsername());
        auxTProfile.setPassword(teamprofile.getPassword());

        db.updateTeamProfileDB(auxTProfile);
    }

    //Remove SoloProfile à DB
    public void removerTProfileDB(long userID)
    {
        if(db.deleteTeamProfileDB(userID))
        {
            Teamprofile teamprofile = getTProfileByID(userID);
            teamprofiles.remove(teamprofile);
        }
    }

    //Events

    //Adiciona Evento à DB
    public void addEventDB(Event event)
    {
        db.addEventToBD(event);
    }

    public ArrayList<Event> getEvents()
    {
        events = db.getAllEventosBD();

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

    public ArrayList<Event> getEventsDB()
    {
        events = db.getAllEventosBD();

        return events;
    }

    public void updateEventDB(Event event)
    {
        //Caso não exista tal recurso
        if(!events.contains(event))
        {
            return;
        }

        Event auxEvent = getEventosByID(event.getId());
        auxEvent.setEvent_name(event.getEvent_name());
        auxEvent.setBegin_date(event.getBegin_date());
        auxEvent.setEnd_date(event.getEnd_date());
        auxEvent.setDescription(event.getDescription());

        db.updateEventDB(event);
    }

    //Remove SoloProfile à DB
    public void removerEventDB(long eventID)
    {
        if(db.deleteEventDB(eventID))
        {
            Event event = getEventosByID(eventID);
            events.remove(event);
        }
    }

    //Posts

    //Adiciona Post à DB
    public void addPostDB(Post post)
    {
        db.addPostToBD(post);
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

    public ArrayList<Post> getPosts()
    {
        posts = db.getAllPostsBD();

        return posts;
    }

    public void updatePostDB(Post post)
    {
        //Caso não exista tal recurso
        if(!posts.contains(post))
        {
            return;
        }

        Post auxPost = getPostByID(post.getId());
        auxPost.setContent(post.getContent());
        auxPost.setTag(post.getTag());
        auxPost.setCreate_time(post.getCreate_time());
        auxPost.setImage(post.getImage());

        db.updatePostDB(post);
    }

    //Remove SoloProfile à DB
    public void removerPostDB(long postID)
    {
        if(db.deletePostDB(postID))
        {
            Post post = getPostByID(postID);
            posts.remove(post);
        }
    }

    //Comments

    //Adiciona Post à DB
    public void addCommentDB(Comment comment)
    {
        db.addCommentToBD(comment);
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

    public ArrayList<Comment> getComments()
    {
        comments = db.getAllCommentsBD();

        return comments;
    }

    public void updateCommentDB(Comment comment)
    {
        //Caso não exista tal recurso
        if(!comments.contains(comment))
        {
            return;
        }

        Comment auxComment = getCommentByID(comment.getId());
        auxComment.setContent(comment.getContent());
        auxComment.setTag(comment.getTag());
        auxComment.setCreate_time(comment.getCreate_time());

        db.updateCommentDB(auxComment);
    }

    //Remove SoloProfile à DB
    public void removerCommentDB(long commentID)
    {
        if(db.deleteCommentDB(commentID))
        {
            Comment comment = getCommentByID(commentID);
            comments.remove(comment);
        }
    }

    @Override
    public void onRefreshSProfilesList(ArrayList<Soloprofile> soloprofileArrayList)
    {

    }

    @Override
    public void onUpdateSProfilesList(Soloprofile soloprofile, int operation)
    {
        switch(operation)
        {
            //Adicionar soloprofile a DB
            case 1:
                addSoloProfileDB(soloprofile);
                break;

            //Atualizar solo profile à DB
            case 2:
                updateSProfileDB(soloprofile);
                break;

            case 3:
                removerSProfileDB(soloprofile.getId());
                break;
        }
    }

    @Override
    public void onRefreshTProfilesList(ArrayList<Teamprofile> teamprofileprofileArrayList)
    {

    }

    @Override
    public void onUpdateTProfilesList(Teamprofile teamprofile, int operation)
    {
        switch(operation)
        {
            //Adicionar soloprofile a DB
            case 1:
                addTeamProfileDB(teamprofile);
                break;

            //Atualizar solo profile à DB
            case 2:
                updateTProfileDB(teamprofile);
                break;

            case 3:
                removerSProfileDB(teamprofile.getId());
                break;
        }
    }

    @Override
    public void onRefreshEventosList(ArrayList<Event> eventArrayList)
    {

    }

    @Override
    public void onUpdateEventosList(Event event, int operation)
    {
        switch(operation)
        {
            //Adicionar soloprofile a DB
            case 1:
                addEventDB(event);
                break;

            //Atualizar solo profile à DB
            case 2:
                updateEventDB(event);
                break;

            case 3:
                removerEventDB(event.getId());
                break;
        }
    }

    @Override
    public void onRefreshPostsList(ArrayList<Post> postArrayList)
    {

    }

    @Override
    public void onUpdateTProfilesList(Post post, int operation)
    {
        switch(operation)
        {
            //Adicionar soloprofile a DB
            case 1:
                addPostDB(post);
                break;

            //Atualizar solo profile à DB
            case 2:
                updatePostDB(post);
                break;

            case 3:
                removerPostDB(post.getId());
                break;
        }
    }

    @Override
    public void onRefreshCommentsList(ArrayList<Comment> commentArrayList)
    {

    }

    @Override
    public void onUpdateCommentsList(Comment comment, int operation)
    {
        switch(operation)
        {
            //Adicionar soloprofile a DB
            case 1:
                addCommentDB(comment);
                break;

            //Atualizar solo profile à DB
            case 2:
                updateCommentDB(comment);
                break;

            case 3:
                removerCommentDB(comment.getId());
                break;
        }
    }
}