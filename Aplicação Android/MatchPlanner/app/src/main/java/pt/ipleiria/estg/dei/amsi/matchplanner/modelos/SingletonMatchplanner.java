package pt.ipleiria.estg.dei.amsi.matchplanner.modelos;

import java.util.ArrayList;

public class SingletonMatchplanner {

    private static SingletonMatchplanner INSTANCE = null; // para garantir que é unica
    private ArrayList<Evento> eventos;



    public static synchronized SingletonMatchplanner getInstance() {
        if (INSTANCE == null) {
            INSTANCE = new SingletonMatchplanner();
        }
        return INSTANCE;
    }
    private SingletonMatchplanner() {
        eventos = new ArrayList<>();
        generateFakeData();
    }

    private void generateFakeData()
    {
        eventos.add(new Evento(1,"AS BOLACHAS DA NOITE","23-23-2345 23:23","23-23-2345 23:43","SDSDSDSDSD",1,2));
        eventos.add(new Evento(2,"AS BOLACHAS DA NOITE","23-23-2345 23:23","23-23-2345 23:43","SDSDSDSDSD",1,2));
        eventos.add(new Evento(3,"AS BOLACHAS DA NOITE","23-23-2345 23:23","23-23-2345 23:43","SDSDSDSDSD",1,2));
        eventos.add(new Evento(4,"AS BOLACHAS DA NOITE","23-23-2345 23:23","23-23-2345 23:43","SDSDSDSDSD",1,2));
        eventos.add(new Evento(5,"AS BOLACHAS DA NOITE","23-23-2345 23:23","23-23-2345 23:43","SDSDSDSDSD",1,2));
        eventos.add(new Evento(6,"AS BOLACHAS DA NOITE","23-23-2345 23:23","23-23-2345 23:43","SDSDSDSDSD",1,2));
        eventos.add(new Evento(7,"AS BOLACHAS DA NOITE","23-23-2345 23:23","23-23-2345 23:43","SDSDSDSDSD",1,2));
    }


    public ArrayList<Evento> getEventos() {
        // return books;
        return new ArrayList<>(eventos);
    }

    public Evento getEventoById(long id){
        for(Evento evento: eventos){
            if (evento.getId_event() == id){
                return evento;
            }
        }
        return null;
    }
    //Ainda esta na lista Btw...
    public void adicionarEventoBD(Evento evento)
    {
        eventos.add(evento);
    }
}
