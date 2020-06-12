import java.util.ArrayList;
import java.util.*; 
import java.lang.*; 
import java.io.*; 
class vertex {
    
    public String name;
    public ArrayList<String> neighbours; 
    vertex(String name){
        this.name=name;
        this.neighbours = new ArrayList<String>();
    }
}

class graph {
     public int V; 
     public ArrayList<vertex> vertices; 
     graph(int v){
         V=v;
         vertices= new ArrayList<vertex>();
     }

     public vertex addvertex(String name){
        vertex v= new vertex(name); 
        this.vertices.add(v);
        return v ;
     }
     
     public int findvertex(String name){
         int vertex=-1;
        for(int i=0 ; i< this.vertices.size(); i++){
            if(vertices.get(i).name==name)
            return i;
        }
        return vertex;
     }
     
     public String addedge(String vertex1 , String vertex2){
         int v1 = findvertex(vertex1);
         int v2 = findvertex(vertex2);
         if(v1 ==-1 || v2==-1 ){
             return "there is no such vertex in graph";
         }
         else {
             vertices.get(v1).neighbours.add(vertices.get(v2).name);
         }
         return "edge added successfully";
     }
     public void revertedge(int v1 , int v2){
         for(int i=0 ; i<vertices.get(v1).neighbours.size();i++){
             if(vertices.get(v1).neighbours.get(i)==vertices.get(v2).name)
                vertices.get(v1).neighbours.remove(i);    
         }
         vertices.get(v2).neighbours.add(vertices.get(v1).name);
         
     }
     
}

 

public class Main
{
    public static List<Integer> bfs(graph rg, vertex s, vertex t , int V) 
    { 
        Map<Integer, Integer> path = new HashMap<Integer,Integer>();
         List<Integer> shortestPath = new ArrayList<>();
        boolean visited[] = new boolean[V]; 
        for(int i=0; i<V; i++) 
            visited[i]=false; 
  
        LinkedList<Integer> queue = new LinkedList<Integer>(); 
        queue.add(rg.findvertex(s.name)); 
        visited[rg.findvertex(s.name)] = true; 
        path.put(rg.findvertex(s.name), -1);
        // Standard BFS Loop 
        while (queue.size()!=0) 
        { 
            int u = queue.poll(); 
            if (rg.vertices.get(u).name == t.name){
              int node = 5;
             while(node >= 0) {
             shortestPath.add(node);
            node = path.get(node);
             }
              Collections.reverse(shortestPath);
            return shortestPath;
            }
           vertex vertex1 = rg.vertices.get(u);
            for (int v=0; v<vertex1.neighbours.size(); v++) 
            { 
	            	
                if (visited[rg.findvertex(vertex1.neighbours.get(v))]==false) 
                { 
                    queue.add(rg.findvertex(vertex1.neighbours.get(v))); 
                    visited[rg.findvertex(vertex1.neighbours.get(v))] = true;
                    path.put(rg.findvertex(vertex1.neighbours.get(v)),u);
                } 
            } 
        } 
   
       if(visited[rg.findvertex("T")]==true){
             int node = 5;
             
             while(node >= 0) 
             {
             shortestPath.add(node);
            node = path.get(node);
             }
        return shortestPath;
       }
       
       else {
           
           return shortestPath=null;}
    }
    
    public static int ford (graph g , vertex s , vertex t){
        int flow =0;
         List<Integer> path=new ArrayList<>();  
         while((path=bfs(g,s,t,6))!=null){
            System.out.println(path);
             flow+=1;
             for(int i=0;i<path.size()-1;i++){
                 g.revertedge(path.get(i),path.get(i+1));
             }
             System.out.println(g.vertices.get(0).neighbours);
             
         }
         return flow;
         
    }
	public static void main(String[] args) {
		graph g =new graph(5);
		vertex s =g.addvertex("S");
		g.addvertex("A");
		g.addvertex("B");
		g.addvertex("C");
		g.addvertex("D");
		vertex t =g.addvertex("T");
		
		System.out.println(g.addedge("A","B"));
		System.out.println(g.addedge("B","C"));
		System.out.println(g.addedge("B","T"));
		System.out.println(g.addedge("S","A"));
		System.out.println(g.addedge("S","C"));
		System.out.println(g.addedge("S","D"));
		System.out.println(g.addedge("C","T"));
		

	
	System.out.println(g.vertices.get(0).name);	
	System.out.println(g.vertices.get(1).name);	
	System.out.println(g.vertices.get(3).name);	
	System.out.println(g.vertices.get(4).name);	
	System.out.println(g.vertices.get(2).name);	
	System.out.println(g.vertices.get(5).name);	
    System.out.println(ford(g, s, t));
	}
}

