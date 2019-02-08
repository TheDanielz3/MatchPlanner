package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;
import java.util.LinkedList;

public class MatchPlannerBDHelper extends SQLiteOpenHelper
{
    //Nome da base de dados
    private static final String DB_NAME = "matchplanner";

    //Nome das tabelas
    private static final String TABLE_SPROFILE = "soloprofile";
    private static final String TABLE_TPROFILE = "teamprofile";
    private static final String TABLE_EVENT = "event";
    private static final String TABLE_POST = "post";
    private static final String TABLE_COMMENT = "comment";
    private static final int DB_VERSION = 1;

    //Instância da DB
    private final SQLiteDatabase database;

    public MatchPlannerBDHelper(Context context)
    {
        super(context, DB_NAME, null, DB_VERSION);
        this.database = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db)
    {
        String createSProfileTable = "CREATE TABLE " + TABLE_SPROFILE + "" + "("
                + "id" + " INTEGER PRIMARY KEY AUTOINCREMENT, "
                + "firstname" + " TEXT NOT NULL, "
                + "surnames" + " TEXT NOT NULL, "
                + "email" + " TEXT NOT NULL, "
                + "gender" + " TEXT NOT NULL, "
                + "birthdate" + " TEXT NOT NULL,"
                + "username" + " TEXT NOT NULL,"
                + "password" + " TEXT NOT NULL"
                + ");";

        String createTProfileTable = "CREATE TABLE " + TABLE_TPROFILE + "" + "("
                + "id" + " INTEGER PRIMARY KEY AUTOINCREMENT, "
                + "team_name" + " TEXT NOT NULL, "
                + "member1" + " TEXT NOT NULL, "
                + "member2" + " TEXT NOT NULL, "
                + "member3" + " TEXT NOT NULL, "
                + "member4" + " TEXT NOT NULL, "
                + "member5" + " TEXT NOT NULL, "
                + "member6" + " TEXT NOT NULL, "
                + "username" + " TEXT NOT NULL, "
                + "password" + " TEXT NOT NULL"
                + ");";

        String createEventTable = "CREATE TABLE " + TABLE_EVENT + "" + "("
                + "id" + " INTEGER PRIMARY KEY AUTOINCREMENT, "
                + "event_name" + " TEXT NOT NULL, "
                + "begin_date" + " TEXT NOT NULL, "
                + "end_date" + " TEXT NOT NULL, "
                + "description" + " TEXT NOT NULL, "
                + "user_id INTEGER, "
                + "team_id INTEGER, "
                + "FOREIGN KEY(user_id) REFERENCES soloprofile(id), "
                + "FOREIGN KEY(team_id) REFERENCES teamprofile(id)"
                + ");";

        String createPostTable = "CREATE TABLE " + TABLE_POST + "" + "("
                + "id" + " INTEGER PRIMARY KEY AUTOINCREMENT, "
                + "title" + " TEXT NOT NULL, "
                + "content" + " TEXT NOT NULL, "
                + "tag" + " TEXT NOT NULL, "
                + "create_time" + " TEXT NOT NULL, "
                + "image" + " TEXT, "
                + "user_id INTEGER, "
                + "team_id INTEGER, "
                + "event_id INTEGER NOT NULL, "
                + "FOREIGN KEY(user_id) REFERENCES soloprofile(id), "
                + "FOREIGN KEY(team_id) REFERENCES teamprofile(id), "
                + "FOREIGN KEY(event_id) REFERENCES event(id)"
                + ");";

        String createCommentTable = "CREATE TABLE " + TABLE_COMMENT + "" + "("
                + "id" + " INTEGER PRIMARY KEY AUTOINCREMENT, "
                + "content" + " TEXT NOT NULL, "
                + "tag" + " TEXT NOT NULL, "
                + "create_time" + " TEXT NOT NULL, "
                + "user_id INTEGER, "
                + "team_id INTEGER, "
                + "event_id INTEGER NOT NULL, "
                + "post_id INTEGER NOT NULL, "
                + "FOREIGN KEY(user_id) REFERENCES soloprofile(id), "
                + "FOREIGN KEY(team_id) REFERENCES teamprofile(id), "
                + "FOREIGN KEY(event_id) REFERENCES event(id), "
                + "FOREIGN KEY(post_id) REFERENCES post(id)"
                + ");";

        db.execSQL(createSProfileTable);
        db.execSQL(createTProfileTable);
        db.execSQL(createEventTable);
        db.execSQL(createPostTable);
        db.execSQL(createCommentTable);
    }

    @Override
    //Em caso de upgrade à BD (não usado)
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion)
    {
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_SPROFILE);
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_TPROFILE);
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_EVENT);
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_POST);
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_COMMENT);

        this.onCreate(db);
    }

    //SoloProfiles

    //Adiciona perfil solo a DB
    public void addSProfileToBD(Soloprofile soloprofile)
    {
        ContentValues values = getSProfileValues(soloprofile);

        values.put("id", soloprofile.getId());
        values.put("firstname", soloprofile.getFirstname());
        values.put("surnames", soloprofile.getSurnames());
        values.put("email", soloprofile.getEmail());
        values.put("gender", soloprofile.getSex());
        values.put("birthdate", soloprofile.getBirthdate());
        values.put("username", soloprofile.getUsername());
        values.put("password", soloprofile.getPassword());

        this.database.insert(TABLE_SPROFILE, null, values);
    }

    //Ver perfil unico
    public void getSoloProfile(Soloprofile soloprofile, long id)
    {
        String query = "SELECT id FROM soloprofile WHERE id = " + id;

        this.database.execSQL(query);
    }

    //Ver perfil unico a partir do username (custom)
    public void getSoloProfileByUsername(Soloprofile soloprofile, String username)
    {
        String query = "SELECT username FROM soloprofile WHERE username LIKE %" + username + "%";

        this.database.execSQL(query);
    }

    //Mostra todos os soloprofiles
    public LinkedList<Soloprofile> getAllSoloprofilesBD()
    {
        LinkedList<Soloprofile> soloprofiles = new LinkedList<>();

        Cursor cursor = this.database.rawQuery("SELECT * FROM " + TABLE_SPROFILE, null);

        if(cursor.moveToFirst())
        {
            do
            {
                soloprofiles.add(new Soloprofile(cursor.getLong(0),
                        cursor.getString(1), cursor.getString(2), cursor.getString(3),
                        cursor.getString(4), cursor.getString(5), cursor.getString(6),
                        cursor.getString(7)));
            } while(cursor.moveToNext());
        }

        return soloprofiles;
    }

    //Values de soloprofiles
    public ContentValues getSProfileValues(Soloprofile soloprofile)
    {
        ContentValues values = new ContentValues();
        values.put("id", soloprofile.getId());
        values.put("firstname", soloprofile.getFirstname());
        values.put("surnames", soloprofile.getSurnames());
        values.put("email", soloprofile.getEmail());
        values.put("gender", soloprofile.getSex());
        values.put("birthdate", soloprofile.getBirthdate());
        values.put("username", soloprofile.getUsername());
        values.put("password", soloprofile.getPassword());

        return values;
    }

    public boolean updateSoloProfileDB(Soloprofile soloprofile)
    {
        ContentValues values = getSProfileValues(soloprofile);

        values.put("id", soloprofile.getId());
        values.put("firstname", soloprofile.getFirstname());
        values.put("surnames", soloprofile.getSurnames());
        values.put("email", soloprofile.getEmail());
        values.put("gender", soloprofile.getSex());
        values.put("birthdate", soloprofile.getBirthdate());
        values.put("username", soloprofile.getUsername());
        values.put("password", soloprofile.getPassword());

        return this.database.update(TABLE_SPROFILE, values, "id = ?", new String[]{"" + soloprofile.getId()}) > 0;
    }

    //Remove perfil solo a DB
    public void deleteSProfileDB(long userID)
    {
        this.database.delete(TABLE_SPROFILE, "id = ?", new String[]{"" + userID});
    }

    //Teamprofiles

    //Adiciona perfil team a DB
    public void addTProfileToBD(Teamprofile teamprofile)
    {
        ContentValues values = getTProfileValues(teamprofile);

        values.put("id", teamprofile.getId());
        values.put("team_name", teamprofile.getTeam_name());
        values.put("member1", teamprofile.getMember1());
        values.put("member2", teamprofile.getMember2());
        values.put("member3", teamprofile.getMember3());
        values.put("member4", teamprofile.getMember4());
        values.put("member5", teamprofile.getMember5());
        values.put("member6", teamprofile.getMember6());
        values.put("username", teamprofile.getUsername());
        values.put("password", teamprofile.getPassword());

        this.database.insert(TABLE_SPROFILE, null, values);
    }

    //Mostra todos os teamprofiles
    public ArrayList<Teamprofile> getAllTeamprofilesBD()
    {
        ArrayList<Teamprofile> teamprofiles = new ArrayList<>();

        Cursor cursor = this.database.rawQuery("SELECT * FROM " + TABLE_TPROFILE, null);

        if(cursor.moveToFirst())
        {
            do
            {
                Teamprofile auxProfile = new Teamprofile(cursor.getLong(0), cursor.getString(1), cursor.getString(1), cursor.getString(2),
                        cursor.getString(3), cursor.getString(4), cursor.getString(5), cursor.getString(6),
                        cursor.getString(7), cursor.getString(8));

                teamprofiles.add(auxProfile);
            } while(cursor.moveToNext());
        }

        return teamprofiles;
    }

    //Values de teamprofiles
    public ContentValues getTProfileValues(Teamprofile teamprofile)
    {
        ContentValues values = new ContentValues();

        values.put("id", teamprofile.getId());
        values.put("team_name", teamprofile.getTeam_name());
        values.put("member1", teamprofile.getMember1());
        values.put("member2", teamprofile.getMember2());
        values.put("member3", teamprofile.getMember3());
        values.put("member4", teamprofile.getMember4());
        values.put("member5", teamprofile.getMember5());
        values.put("member6", teamprofile.getMember6());
        values.put("username", teamprofile.getUsername());
        values.put("password", teamprofile.getPassword());

        return values;
    }

    public boolean updateTeamProfileDB(Teamprofile teamprofile)
    {
        ContentValues values = getTProfileValues(teamprofile);

        values.put("id", teamprofile.getId());
        values.put("team_name", teamprofile.getTeam_name());
        values.put("member1", teamprofile.getMember1());
        values.put("member2", teamprofile.getMember2());
        values.put("member3", teamprofile.getMember3());
        values.put("member4", teamprofile.getMember4());
        values.put("member5", teamprofile.getMember5());
        values.put("member6", teamprofile.getMember6());
        values.put("username", teamprofile.getUsername());
        values.put("password", teamprofile.getPassword());

        return this.database.update(TABLE_SPROFILE, values, "id = ?", new String[]{"" + teamprofile.getId()}) > 0;
    }

    public boolean deleteTeamProfileDB(long id)
    {
        return this.database.delete(TABLE_TPROFILE, "id = ?", new String[]{"" + id}) == 1;
    }

    //Eventos

    //Adiciona event a DB
    public void addEventToBD(Event event)
    {

    }

    //Mostra todos os eventos
    public ArrayList<Event> getAllEventosBD()
    {
        ArrayList<Event> events = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_EVENT, new String[]{"event_name", "begin_date", "end_date",
                        "description"},
                null, null, null, null, null, null);

        if(cursor.moveToFirst())
        {
            do
            {
                Event auxEvent = new Event(cursor.getString(0), cursor.getString(1), cursor.getString(2),
                        cursor.getString(3));

                events.add(auxEvent);
            } while(cursor.moveToNext());
        }

        return events;
    }

    //Values de eventos
    private ContentValues getEventValues(Event event)
    {
        ContentValues values = new ContentValues();
        values.put("id", event.getId());
        values.put("event_name", event.getEvent_name());
        values.put("begin_date", event.getBegin_date());
        values.put("end_date", event.getEnd_date());
        values.put("description", event.getDescription());

        return values;
    }

    public boolean updateEventDB(Event event)
    {
        ContentValues values = getEventValues(event);

        return
                ( this.database.update(TABLE_EVENT, values, "id=?", new String[]{"" + event.getId()})) > 0;
    }

    public boolean deleteEventDB(long id)
    {
        return this.database.delete(TABLE_EVENT, "id = ?", new String[]{"" + id}) == 1;
    }

    //Posts

    //Adiciona Post a DB
    public void addPostToBD(Post post)
    {
        ContentValues values = getPostValues(post);

        this.database.insert(TABLE_POST, null, values);
    }

    //Mostra todos os posts
    public ArrayList<Post> getAllPostsBD()
    {
        ArrayList<Post> posts = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_POST, new String[]{"title", "content", "tag",
                        "create_time", "image"},
                null, null, null, null, null, null);

        if(cursor.moveToFirst())
        {
            do
            {
                Post auxPost = new Post(cursor.getString(0), cursor.getString(1),
                        cursor.getString(2));

                posts.add(auxPost);
            } while(cursor.moveToNext());
        }

        return posts;
    }

    //Values de posts
    private ContentValues getPostValues(Post post)
    {
        ContentValues values = new ContentValues();
        values.put("id", post.getId());
        values.put("title", post.getTitle());
        values.put("content", post.getContent());
        values.put("tag", post.getTag());
        values.put("create_time", post.getCreate_time());
        values.put("image", post.getImage());

        return values;
    }

    public boolean updatePostDB(Post post)
    {
        ContentValues values = getPostValues(post);

        return
                ( this.database.update(TABLE_POST, values, "id=?", new String[]{"" + post.getId()})) > 0;
    }

    public boolean deletePostDB(long id)
    {
        return this.database.delete(TABLE_POST, "id = ?", new String[]{"" + id}) == 1;
    }

    //Comments

    //Adiciona Comment A DB
    public void addCommentToBD(Comment comment)
    {
        ContentValues values = getCommentValues(comment);

        this.database.insert(TABLE_COMMENT, null, values);
    }

    //Mostra todos os comments
    public ArrayList<Comment> getAllCommentsBD()
    {
        ArrayList<Comment> comments = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_COMMENT, new String[]{"content", "tag",
                        "create_time"},
                null, null, null, null, null, null);

        if(cursor.moveToFirst())
        {
            do
            {
                Comment auxComment = new Comment(cursor.getString(0), cursor.getString(1));

                comments.add(auxComment);
            } while(cursor.moveToNext());
        }

        return comments;
    }

    //Values de comments
    private ContentValues getCommentValues(Comment comment)
    {
        ContentValues values = new ContentValues();
        values.put("id", comment.getId());
        values.put("content", comment.getContent());
        values.put("tag", comment.getTag());
        values.put("create_time", comment.getCreate_time());

        return values;
    }

    public boolean updateCommentDB(Comment comment)
    {
        ContentValues values = getCommentValues(comment);

        return ( this.database.update(TABLE_COMMENT, values, "id=?", new String[]{"" + comment.getId()})) > 0;
    }

    public boolean deleteCommentDB(long id)
    {
        return this.database.delete(TABLE_COMMENT, "id = ?", new String[]{"" + id}) == 1;
    }
}