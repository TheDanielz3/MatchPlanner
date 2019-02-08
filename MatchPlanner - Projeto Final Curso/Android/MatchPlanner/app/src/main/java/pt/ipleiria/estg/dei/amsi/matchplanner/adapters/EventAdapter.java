package pt.ipleiria.estg.dei.amsi.matchplanner.adapters;


import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.matchplanner.R;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Comment;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Event;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Post;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Soloprofile;
import pt.ipleiria.estg.dei.amsi.matchplanner.modelos.Teamprofile;

public class EventAdapter extends BaseAdapter
{
    private Context context;
    private LayoutInflater inflater;

   // private ArrayList<Soloprofile> soloprofiles;
   // private ArrayList<Teamprofile> team;
    private ArrayList<Event> events;
   // private ArrayList<Post> posts;
    //private ArrayList<Comment> comments;


    public EventAdapter(Context context, ArrayList<Event> events)
    {
        this.context = context;
        this.events = events;
    }

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
        if (inflater == null){
            inflater = (LayoutInflater)context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        }

        if (convertView == null){
            //convertView = inflater.inflate(R.layout.event_, null);
        }

        ViewHolderList viewHolderList = (ViewHolderList)convertView.getTag();

        if (viewHolderList == null){
            viewHolderList = new ViewHolderList(convertView);
            convertView.setTag(viewHolderList);
        }
        viewHolderList.update(events.get(position));

        return convertView;

    }
    private class ViewHolderList
    {
        private EditText editTextEventName;
        private EditText editTextBeginDate;
        private EditText editTextEndDate;
        private EditText editTextDescription;

        public ViewHolderList(View convertView)
        {
            editTextEventName = convertView.findViewById(R.id.editTextEventName);
            editTextBeginDate = convertView.findViewById(R.id.editTextBeginDate);
            editTextEndDate = convertView.findViewById(R.id.editTextEndDate);
            editTextDescription = convertView.findViewById(R.id.editTextDescription);
        }

        public void update(Event event)
        {
            editTextEventName.setText(event.getEvent_name());
            editTextBeginDate.setText(event.getBegin_date());
            editTextEndDate.setText(event.getEnd_date());
            editTextDescription.setText(event.getDescription());
        }
    }
}


