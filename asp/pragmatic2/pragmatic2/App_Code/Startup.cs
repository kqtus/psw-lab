using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(pragmatic2.Startup))]
namespace pragmatic2
{
    public partial class Startup {
        public void Configuration(IAppBuilder app) {
            ConfigureAuth(app);
        }
    }
}
