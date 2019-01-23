using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

using pragmatic3.Source;

namespace pragmatic3
{
    public partial class Login : System.Web.UI.Page
    {
        protected DatabaseAdapter _dbAdapter;

        protected override void OnInit(EventArgs e)
        {
            _dbAdapter = DatabaseAdapter.GetInstance();
        }

        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void LoginButton_Click(object sender, EventArgs e)
        {
            var login = LoginTextBox.Text;
            var password = PasswordTextBox.Text;

            bool isValidUser = _dbAdapter.ValidateUser(login, password);

            if (isValidUser)
            {
                Session["logged_in"] = true;
                Session["username"] = login;
                Response.Redirect("~/Default.aspx");
            }
        }
    }
}