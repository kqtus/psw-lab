<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/Site.Master" CodeBehind="Register.aspx.cs" Inherits="pragmatic3.Register" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <form method="post">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://cdn4.iconfinder.com/data/icons/computer-monitor-vol-2/100/computer_screen21-512.png" alt=""/>
                    <h3>Welcome!</h3>
                    <p>You are 30 seconds away from accessing the most reliable source of informations about newest technologies out there!</p>
                </div>
                <div class="col-md-9 register-right">
                    <div class="register-heading">
                        <h3>Register.</h3>
                        <p>
                            Do you already have account?
                            <a href="Login">Login.</a>
                        </p>
                    </div>

                    <div class="row register-form">
                        <div class="form-group" style="margin-bottom: 100px;">
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <asp:TextBox ID="nameTextBox" runat="server" CssClass="form-control" placeholder="Login *"></asp:TextBox>
                                    <asp:RequiredFieldValidator runat="server" ControlToValidate="nameTextBox" Display="Dynamic" ErrorMessage="Please enter your name" ForeColor="Red" />
                                </div>
                                <div class="form-group">
                                    <asp:TextBox ID="nickTextBox" runat="server" class="form-control" placeholder="Nick *"></asp:TextBox>
                                    <asp:RequiredFieldValidator runat="server" ControlToValidate="nickTextBox" Display="Dynamic" ErrorMessage="Please enter your nickname" ForeColor="Red" />
                                </div>
                                <div class="form-group">
                                    <asp:TextBox ID="passwordTextBox" TextMode="Password" runat="server" CssClass="form-control" placeholder="Password *"></asp:TextBox>
                                    <asp:RequiredFieldValidator runat="server" ControlToValidate="passwordTextBox" Display="Dynamic" ErrorMessage="Please enter password" ForeColor="Red" />
                                </div>
                                <div class="form-group">
                                    <asp:TextBox ID="passwordConfTextBox" TextMode="Password" runat="server" CssClass="form-control" placeholder="Confirm password *"></asp:TextBox>
                                    <asp:CompareValidator Display="Dynamic" runat="server" ControlToValidate="passwordTextBox" ControlToCompare="passwordConfTextBox" ErrorMessage="Confirmation password differs." ForeColor="Red" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <asp:TextBox runat="server" ID="emailTextBox" TextMode="Email" CssClass="form-control" placeholder="Your Email *" />
                                    <asp:RequiredFieldValidator runat="server" ControlToValidate="emailTextBox" Display="Dynamic" ErrorMessage="Please enter your email" ForeColor="Red" />
                                </div>
                                <div class="form-group">
                                    <asp:TextBox ID="phoneTextBox" TextMode="Phone" runat="server" CssClass="form-control" placeholder="Your Phone " />
                                    <asp:RegularExpressionValidator Display="Dynamic" runat="server" ControlToValidate="phoneTextBox" ValidationExpression="^[0-9]{3}-[0-9]{3}-[0-9]{3}$" ErrorMessage="Phone number has to be like DDD-DDD-DDD" ForeColor="Red" />
                                </div>
                                <div class="form-group">
                                    <select name="question" class="form-control">
                                        <option class="hidden" selected disabled>Please select your Sequrity Question</option>
                                        <option>1. How old were you in 2016?</option>
                                        <option>2. What is your height (meters)?</option>
                                        <option>3. What is name of your pet?</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="answer" class="form-control" placeholder="Enter Your Answer" value="" />
                                </div>
                                <asp:Button ID="registerButton" Text="Register" CssClass="btnRegister" runat="server"/>
                            </div>
                        </div>

                        <div style="text-align: center; margin-top: 20px;">
                            <asp:Label runat="server" ID="responseLabel" Visible="false"/>
                            <asp:Label runat="server" ID="forwardUserLabel" Visible="false">
                                Now you can go 
                                <a href="Login.aspx">
                                    here
                                </a>
                                to login.
                            </asp:Label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</asp:Content>