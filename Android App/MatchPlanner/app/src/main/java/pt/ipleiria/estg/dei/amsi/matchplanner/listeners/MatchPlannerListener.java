package pt.ipleiria.estg.dei.amsi.matchplanner.listeners;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Comment;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Event;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Post;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Teamprofile;

public interface MatchPlannerListener
{
    void onRefreshSProfilesList(ArrayList<Soloprofile> soloprofileArrayList);

    void onUpdateSProfilesList(Soloprofile soloprofile, int operation);

    void onRefreshTProfilesList(ArrayList<Teamprofile> teamprofileprofileArrayList);

    void onUpdateTProfilesList(Teamprofile teamprofile, int operation);

    void onRefreshEventosList(ArrayList<Event> eventArrayList);

    void onUpdateEventosList(Event event, int operation);

    void onRefreshPostsList(ArrayList<Post> postArrayList);

    void onUpdateTProfilesList(Post post, int operation);

    void onRefreshCommentsList(ArrayList<Comment> commentArrayList);

    void onUpdateCommentsList(Comment comment, int operation);
}
