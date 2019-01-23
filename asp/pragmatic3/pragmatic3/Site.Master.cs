using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace pragmatic3
{
    public partial class SiteMaster : MasterPage
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            var loggedIn = Session["logged_in"];
            bool isUserLoggedIn = loggedIn != null && (bool)loggedIn == true;

            LoginBtn.Visible = !isUserLoggedIn;
            RegisterBtn.Visible = !isUserLoggedIn;
            GreetingLabel.Visible = isUserLoggedIn;
            LogoutBtn.Visible = isUserLoggedIn;

            if (isUserLoggedIn)
            {
                GreetingLabel.Text = $"Hello, {Session["username"]}!";
            }
        }

        protected void LogoutBtn_Click(object sender, EventArgs e)
        {
            Session["logged_in"] = false;
            //Response.Redirect("~/Default.aspx");
        }
    }
}