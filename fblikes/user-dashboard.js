function showleaderboard()
{
  
    
    document.getElementById('dashboardcontainer').style.display="none";
    getleader();
    document.getElementById('leaderboardcontainer').style.display="";
        

}
function showdashboard()
{

    document.getElementById('leaderboardcontainer').style.display="none";
    document.getElementById('dashboardcontainer').style.display="";
    
}