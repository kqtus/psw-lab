using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace pragmatic3
{
    public partial class Register : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (IsPostBack)
            {
                Validate();

                if (IsValid)
                {
                    var name = nameTextBox.Text;
                    var nick = nickTextBox.Text;
                    var password = nickTextBox.Text;
                    var phone = phoneTextBox.Text;

                    responseLabel.Text = "You have succesfully registered as " + name + " (" + nick + ")!";
                    responseLabel.Visible = true;
                    forwardUserLabel.Visible = true;
                }
            }
        }
    }
}