
<main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                  <div class="card-inner">
                    <h5 class="card-title">Jobs</h5>
                    <h1 class="font-weight-light pb-2 mb-1 border-bottom">{{ count($jobs) }}</h1>
                    <div class="card-icon-wrapper">
                      <i class="material-icons">work</i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h5 class="card-title">Applicants</h5>
                    <h1 class="font-weight-light pb-2 mb-1 border-bottom">{{ count($applicants) }}</h1>
                    <div class="card-icon-wrapper">
                      <i class="material-icons">supervisor_account</i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h5 class="card-title">Job Offers</h5>
                    <h1 class="font-weight-light pb-2 mb-1 border-bottom">2</h1>
                    <div class="card-icon-wrapper">
                      <i class="material-icons">description</i>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Atelast 2 or 3 lang ang makita na recently Jobs dani para dili sigeg scroll down si hr sa joblist -->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
                <div class="mdc-card">
                  <h2 class="card-title" style="margin-bottom: 20px;">Latest Job</h4>
                  <div class="mdc-card bg-primary text-white">
                    <div class="d-flex justify-content-between">
                      <h3 class="font-weight-normal">{{ strtoupper($latest->name) }}</h3>
                    </div>
                    <div class="mdc-layout-grid__inner align-items-center">
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone">
                        <div>
                          <h5 class="font-weight-normal mt-2">{{ count($latest->applications) }} Applicants</h5>
                          <a href="pages/jobs/job-details.html"><button class="mdc-button mt-3 mdc-button--light">
                              View Job Details
                            </button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                <div class="mdc-card">
                  <div class="summary">
                    <div class="d-flex justify-content-between">
                      <h3 class="font-weight-normal">Applicants Summary</h3>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hoverable">
                        <tbody>
                          <tr>
                            <td class="text-left">New Applicant</td>
                            <td class="label">1</td>
                          </tr>
                          <tr>
                            <td class="text-left">Applicant's Response</td>
                            <td class="label">0</td>
                          </tr>
                          <tr>
                            <td class="text-left">Waiting for my Action</td>
                            <td class="label">0</td>
                          </tr>
                        </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="summary summary-2">
                    <div class="d-flex justify-content-between">
                      <h3 class="font-weight-normal">Offer to Hire</h3>
                      <div class="d-flex justtify-content-between align-items-center">
                        <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2">Last 30 days</p>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hoverable">
                        <tbody>
                          <tr>
                            <td class="text-left">Offers Made</td>
                            <td class="label">1</td>
                          </tr>
                          <tr>
                            <td class="text-left">Offers Accepted</td>
                            <td class="label">0</td>
                          </tr>
                          <tr>
                            <td class="text-left">Offers Declined</td>
                            <td class="label">0</td>
                          </tr>
                        </tbody>
                    </table>
                    </div>
                  </div> 
                </div>
              </div>
             
             
            </div>
          </div>
        </main>