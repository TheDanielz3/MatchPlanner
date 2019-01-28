package pt.ipleiria.estg.dei.amsi.matchplanner.adapters;


import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Comment;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Event;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Post;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Teamprofile;

public class MatchPlannerAdapter extends BaseAdapter
{
    private Context context;
    private LayoutInflater inflater;

    private ArrayList<Soloprofile> soloprofiles;
    private ArrayList<Teamprofile> team;
    private ArrayList<Event> events;
    private ArrayList<Post> posts;
    private ArrayList<Comment> comments;

    @Override
    public int getCount()
    {
        return 0;
    }

    @Override
    public Object getItem(int position)
    {
        return null;
    }

    @Override
    public long getItemId(int position)
    {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent)
    {
        return null;
    }
}
