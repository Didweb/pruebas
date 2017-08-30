#!groovy

nameJob = "testPipeline"
pipeline{
agent any
environment {
  authorName = sh(script: "git show -s --pretty=%an", returnStdout: true).trim()
  authorEmail = sh(script: "git show -s --pretty=%ae", returnStdout: true).trim()
  managerName = "Clemens"
  managerEmail = "eduardo.pinuaga-linares@elementsystems.de"
  }
stages{
  // -------------------------------
  // ----- STAGE: 'Build'
  // -------------------------------
  stage ('Build'){
      steps {

          echo '---------------------------------------'
          echo '             Build'
          echo '---------------------------------------'
          sh 'rm -rf *'
          sh 'rm -rf .git'
          checkout scm
          sh ('git branch test')
          sh('git branch -av')

      }

  }

  // -------------------------------
  // ----- STAGE: 'Unit Test'
  // -------------------------------
  stage ('Unit Test'){
    steps {

      parallel("Composer":{
          echo '---------------------------------------'
          echo '             Composer und Unit Test'
          echo '---------------------------------------'
          sh('pwd')
          sh('ls')

          },
          "PhpUnit":{
            if(env.BRANCH_NAME != 'test') {
            sh('composer update')
              sh('phpunit tests')
              })
            }
          }
          post {
              failure {
                     mail to:"${authorEmail}", subject:"ERROR: ${currentBuild.fullDisplayName}",
                     body: """Opps,  Error .
                      Build: ${currentBuild.fullDisplayName}
                      Branch: ${BRANCH_NAME}

                      Check me: https://ci.elementsystems.de/job/${nameJob}/job/${BRANCH_NAME}/
                      Log: https://ci.elementsystems.de/job/${nameJob}/job/${BRANCH_NAME}/${number}/console
                     """


                     mail to:"${managerEmail}", subject:"ERROR: ${currentBuild.fullDisplayName}",
                     body: """Opps,  Error .

                      Author Commit: ${authorName}
                      Build: ${currentBuild.fullDisplayName}
                      Branch: ${BRANCH_NAME}

                      Check me: https://ci.elementsystems.de/job/${nameJob}/job/${BRANCH_NAME}/
                      Log: https://ci.elementsystems.de/job/${nameJob}/job/${BRANCH_NAME}/${number}/console
                     """
                   }

                 }



  }

    // -------------------------------
    // ----- STAGE: 'Deploy'
    // -------------------------------
    stage ('Push to Branch Test'){
        steps {
        echo '---------------------------------------'
        echo '            Push to Branch Test'
        echo '---------------------------------------'

        git branch: '${BRANCH_NAME}', credentialsId: 'test-identity', url: 'https://github.com/Didweb/pruebas.git'

        sh ('git branch -av')
        sh ('git checkout  test')
        sh ('git merge  ${BRANCH_NAME}')
        sh ('git branch -av')

          withCredentials([usernamePassword(
            credentialsId: '29465d95-fb54-4b02-96e2-419565ccc90a',
            usernameVariable: 'USERNAME',
            passwordVariable: 'PASSWORD')]) {
            sh ('git push https://${USERNAME}:${PASSWORD}@github.com/Didweb/pruebas.git test')
          }

        }
        post{
          success {
                  mail to:"${managerEmail}", subject:"OK Marge to test: ${currentBuild.fullDisplayName}",
                  body: """OK,  Success.

                  Author Commit: ${authorName}
                  Build: ${currentBuild.fullDisplayName}
                  Branch: ${BRANCH_NAME}

                  Check me: https://ci.elementsystems.de/job/${nameJob}/job/${BRANCH_NAME}/

                  """

            }
            failure {

              mail to:"${managerEmail}", subject:"ERROR Marge to test: ${currentBuild.fullDisplayName}",
              body: """Opps,  Error. Marge branch test

               Author Commit: ${authorName}
               Build: ${currentBuild.fullDisplayName}
               Branch: ${BRANCH_NAME}

               Check me: https://ci.elementsystems.de/job/${nameJob}/job/${BRANCH_NAME}/
               """
            }
        }
      }
  }
} // pipeline
