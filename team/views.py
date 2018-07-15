from django.shortcuts import render, get_object_or_404
from .models import Member
from django.views.generic import ListView
# Create your views here.
class MemberListView(ListView):
    queryset = Member.objects.all()
    context_object_name = 'members'
    paginate_by = 6
    template_name = 'team/members/list.html'
    
    
def Member_Detail(request, staff_id):
    member = get_object_or_404(Member, staff_id=staff_id
                             )
    return render(request,
                  'team/members/detail.html',
                  {'member':member,
                  })

