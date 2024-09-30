<main id="main" class="main">
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Reports</h2>
                <p>Click on the report title to display your report</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="report-selection">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Report Number</th>
                                    <th scope="col">Report Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td><a href="<?= site_url('employee/view'); ?>" class="report-link">Employee List</a></td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td><a href="<?= site_url('workplace/view'); ?>" class="report-link">Work Place Details</a></td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td><a href="<?= site_url('item/view'); ?>" class="report-link">Item List</a></td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td><a href="<?= site_url('agent/view'); ?>" class="report-link">Agent List</a></td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td><a href="<?= site_url('instructions/view'); ?>" class="report-link">Instruction List</a></td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td><a href="<?= site_url('loantypes/view'); ?>" class="report-link">Loan Types</a></td>
                                </tr>
                                <tr>
                                    <td>07</td>
                                    <td><a href="<?= site_url('loanmaster/grantedloans'); ?>" class="report-link">Details of Granted Loans</a></td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td><a href="<?= site_url('substitution/view'); ?>" class="report-link">Employee Substitution</a></td>
                                </tr>
                                 <tr>
                                    <td>09</td>
                                    <td><a href="<?= site_url('payroll/slip_file'); ?>" class="report-link">Slip file</a></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td><a href="<?= site_url('ot/view'); ?>" class="report-link">Over Time</a></td>
                                </tr>
                                <!-- Potential for more reports to be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

