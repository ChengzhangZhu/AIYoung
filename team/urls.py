from django.urls import re_path,path
from .import views


app_name = 'team'
urlpatterns = [
        #member list views
        re_path(r'^$', views.MemberListView.as_view(), name = 'member_list'),
        path('<slug:staff_id>/',
            views.Member_Detail,
            name='member_detail'),
        ]